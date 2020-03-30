import {LatinGreek} from '../scripts/myUtils.js?v=0.1.6';
/**
 * function beta2uni
 * convert ASCI-string (betacode) to unicode extended-greek and normalize the greek
 * @param string : string //one line to be converted
 * @returns {string} //unicode string
 */
export function beta2uni(string) { //beta code to unicode extended Greek
    let vocals = "aehiouwr",
        accents = "\\/=", accent,
        iotas = "ahw", iota, //deze kunnen iota subscr. hebben
        longs = "ahiuw", longvoc, //deze kunnen circumflexus hebben (lange vocalen)
        offset,
        vocal,
        spirit,
        hoofdletter,
        str_index = 0,
        unichar,
        curr,
        nextchar,
        flags, has_spirit, has_acc, has_iota, has_umlaut,
        uni_offset,
        i, tmp,
        result = "";

    tmp = "";
    for (i = 0; i < string.length; i += 1) {
        tmp += LatinGreek.convertG_L(string[i]);
    }
    string = tmp;
    while (str_index < string.length) {
        uni_offset = 0;
        spirit = -1;
        has_spirit = 0;
        has_acc = 0;
        has_iota = 0;
        has_umlaut = 0;
        flags = hoofdletter = 0;

        curr = string[str_index];
        // 1: * or letter
        if (curr === "*") { //hoofdletter, voorafgaand aan letter + tekens
            hoofdletter = 8; //offset
            i = 1;
            do {
                curr = string[str_index + i]; //scan ahead for the letter
                i += 1;
                if (str_index + i > string.length) {
                    myAlert(string + "<br>Betacode error at position: " + str_index, true, null);
                    return "";
                }
            } while (!(curr >= "a" && curr <= "z"));
        } //curr is now the letter in question
        offset = 0; //cumulative offset from string[str_index+1]

        // 2: (vocals or "r") breathing? "(" or ")"
        vocal = vocals.indexOf(curr); // "aehiouwr"
        if (vocal >= 0) { //non-vocals on the 0x300 unicode page
            nextchar = string[str_index + 1 + offset]; // breathing?
            if (nextchar === ")") {
                spirit = 0;
            }
            else if (nextchar === "(") {
                spirit = 1;
            }
            if (spirit >= 0) { // breathing + ?accent?
                has_spirit = 1; //bit 0
                offset += 1;
            }
            nextchar = string[str_index + 1 + offset];
            accent = accents.indexOf(nextchar); //accent can be -1
            if (accent >= 0) {
                offset += 1; //breathing + accent
                has_acc = accent === 0 ? 2 : accent * 4; //bits 1,2,3
            }

            nextchar = string[str_index + 1 + offset]; //umlaut?
            if (nextchar === "+") {
                offset += 1;
                has_umlaut = 16;
            }
            longvoc = longs.indexOf(curr);
        }
        if (hoofdletter) {
            offset += 1;
        }
        nextchar = string[str_index + 1 + offset];
        if (nextchar === "|") {//iota subscr before lowercase but AFTER capital
            offset += 1;
            has_iota = 32;
            iota = iotas.indexOf(curr);
        }
        // we have the flags, now the calculations:
        //spirit:1 acc:2,4,8 umlaut:16 iota:32
        flags = has_spirit | has_acc | has_umlaut | has_iota;
        if (flags) { //if extended Greek:
            if (flags === 0x01 && curr === "r") {
                if (!hoofdletter) {
                    uni_offset = 0xE4 + spirit;
                } else {
                    uni_offset = 0xEC;
                }
            }
            else if ((flags & 0x01) && (flags <= 0x09)) { // breathing[+acc]
                uni_offset = (vocal * 16) + spirit + 2 * (accent + 1) + hoofdletter; // unicode 1F00 + (0-6F)
            }
            else if (flags === 2 || flags === 4) { //only grave or acute
                if (hoofdletter) {
                    if (longvoc >= 0) {
                        uni_offset = 0xBA + longvoc * 16 + accent;
                    }
                    else if (curr === "e") {
                        uni_offset = 0xC8 + accent;
                    }
                    else if (curr === "o") {
                        uni_offset = 0xF8 + accent;
                    }
                }
                else {
                    uni_offset = 0x70 + vocal * 2 + accent; //0x70-7F
                }
            }
            else if (((flags & 0x21) === 0x21) && ((flags ^ 0x21) <= 0x08)) { //iota+breathing[plus accent]
                uni_offset = (8 + iota) * 16 + spirit + 2 * (accent + 1) + hoofdletter; //0x80-AF
            }
            else if (flags === 0x12 || flags === 0x22) { // \ plus iota or +
                uni_offset = 0xB2 + longvoc * 16 + hoofdletter;
            }
            else if (flags === 0x20 || flags === 0x14) { // iota alone or / plus +
                uni_offset = 0xB3 + longvoc * 16 +
                    (hoofdletter ? 9 : 0);
            }
            else if (flags === 0x24) { // / plus iota
                uni_offset = 0xB4 + longvoc * 16 + hoofdletter;
            }
            else if (flags === 0x08) { // = alone
                uni_offset = 0xB6 + longvoc * 16 + hoofdletter;
            }
            else if (flags === 0x18 || flags === 0x28) { // = plus iota or +
                uni_offset = 0xB7 + longvoc * 16 + hoofdletter;
            }
            else if (flags === 0x10) { // + alone
                if (curr === "i") {
                    uni_offset = -0x1C00 + 0xCA; //offset back to the 0x300 page
                } else if (curr === "u") {
                    uni_offset = -0x1C00 + 0xCB;
                }
            }
            unichar = 0x1F00 + uni_offset;
        }

        offset += 1;
        str_index += offset;

        if (!flags) { //not extended greek
            if (curr >= "a" && curr <= "z") {
                unichar = LatinGreek.greek_charcode(LatinGreek.latin2index(curr) - 3 * hoofdletter); // i.e. -24 or 0
                if (curr === "s" && !hoofdletter) {
                    nextchar = string[str_index]; //next char
                    if (str_index < string.length && ((nextchar >= "a" && nextchar <= "z") || nextchar === "'")) {
                        unichar = "σ".charCodeAt(0);
                    } else {
                        unichar = "ς".charCodeAt(0);
                    }
                }
            } else {
                if (curr === "'") {
                    unichar = 0x1FBD;
                }
                else {
                    unichar = curr.charCodeAt(0); //as it is
                }
            }
        }
        unichar = LatinGreek.norm_1F_to_03(unichar); //normalize !
        result += String.fromCharCode(unichar);
    }
    return result;
}

/*
0x300 range: "a.ehi.o.uwiabgdezhqiklmncopr.stufxywiuaehiuabgdezhqiklmncoprsstufxywiuouw" //386 - 3ce
1Fxx range:
16x a,e,h,i,o,u,w 0-6F
aaeehhiioouuww.. 70-7F
16x a,h,w 80-AF
16x a,h,i,u,w b0-ff
*/
/**
 * function uni2beta
 * convert unicode string to betacode (all lowercase)
 * @param string //string to be converted
 * @param accents //flag: if false delete all breathings, accents, uppercase markers etc.
 * @returns {string} //betacode string
 */
export function uni2beta(string, accents) {
    let sindex,
        code,
        beta,
        result,
        acc,
        capital,
        iota,
        ahiuwr = "ahiuwr",
        ah,
        ix, row, column,
        beta0300 = "abgdezhqiklmncopr.stufxywiuaehiuabgdezhqiklmncoprsstufxywiuouw", //unicode ranges of Greek chars
        beta1F00 = "aehiouw.ahwahiuw",
        beta1F70 = "aaeehhiioouuww..",
        beta_accents = [")", "(", ")\\", "(\\", ")/", "(/", ")=", "(="];

    sindex = 0;
    result = "";
    while (sindex < string.length) {
        capital = false;
        acc = "";
        iota = "";
        code = string.charCodeAt(sindex);
        code = LatinGreek.conv_03_to_1F(code); //change some 03-pagers to the 1F-page for ease of processing

        if (code > 0x300 && code < 0x400) {
            ix = code - 0x391;
            beta = beta0300[ix];
            if (accents && (code >= 0x391 && code <= 0x3A9)) {
                capital = true;
                acc = "*";
            }
            if (accents && (code === 0x3CA || code === 0x3CB)) {
                acc = "+";
            }
        }
        else if (code === 0x1FBD) {
            beta = "'";
        }
        else if (code >= 0x1f00 && code < 0x2000) {
            ix = code - 0x1F00;
            row = Math.floor(ix / 16);
            column = ix % 16;
            if (row !== 7) {
                beta = beta1F00[row];
                if (row === 14 && (column === 4 || column === 5 || column === 12)) {
                    beta = "r";
                }
            }
            if (row === 7) {
                beta = beta1F70[column];
            }
            if (accents) {
                // if (row > 7 && row < 11) {
                //     beta += "i";
                // }
                // if (row === 11 || row === 12 || row === 15) {
                //     if (column === 2 || column === 3 || column === 4 ||
                //         column === 7 || column === 12) {
                //         beta += "i";
                //     }
                // }
                //} else {
                if (row < 7) {
                    acc = beta_accents[column % 8];
                } else if (row === 7) {
                    if (column & 1) {
                        acc = "/";
                    } else {
                        acc = "\\";
                    }
                } else if (row > 7 && row < 11) {
                    acc = beta_accents[column % 8];
                    iota = "|";
                } else if (row >= 11) {
                    ah = ahiuwr.indexOf(beta);
                    if (column === 2) {
                        acc = "\\";
                        if (ah === 0 || ah === 1 || ah === 4) {
                            iota = "|";
                        } else if (ah === 2 || ah === 3) {
                            acc += "+";
                        }
                    } else if (column === 3) {
                        if (ah === 0 || ah === 1 || ah === 4) {
                            iota = "|";
                        } else if (ah === 2 || ah === 3) {
                            acc = "/+";
                        }
                    } else if (column === 4) {
                        if (ah === 0 || ah === 1 || ah === 4) {
                            acc = "/";
                            iota = "|";
                        } else if (ah === 5) {
                            acc = ")";
                        }
                    } else if (column === 5) {
                        if (ah === 5) {
                            acc = "("; // "ῤ or ῥ"
                        }
                    } else if (column === 6) {
                        acc = "=";
                    } else if (column === 7) {
                        acc = "=";
                        if (ah === 0 || ah === 1 || ah === 4) {
                            iota = "|";
                        } else if (ah === 2 || ah === 3) {
                            acc += "+";
                        }
                    } else if (column === 8) {
                        if (ah === 1 || ah === 4) {
                            acc = "\\";
                        }
                    } else if (column === 9) {
                        if (ah === 1 || ah === 4) {
                            acc = "/";
                        }
                    } else if (column === 10) {
                        acc = "\\";
                    } else if (column === 11) {
                        acc = "/";
                    } else if (column === 12) {
                        if (ix === 0xEC) {
                            acc = ")"; // "Ῥ"
                        } else {
                            iota = "|";
                        }
                    }
                }
                if (row !== 7 && column >= 8) {
                    if (ix === 0xBD) {
                        beta = "'";
                    } else {
                        capital = true;
                        acc = "*" + acc;
                    }
                }
            }
        }
        else {
            beta = String.fromCharCode(code);
        }
        if (capital) {
            beta = acc + beta + iota;
        }
        else {
            beta = beta + acc + iota;
        }
        sindex += 1;
        result += beta;
    }
    return result;
}

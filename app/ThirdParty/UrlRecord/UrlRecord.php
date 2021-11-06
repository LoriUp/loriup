<?php

  class UrlRecord {
    /**
     * Stores Unicode characters and their "normalized"
     * values to a hash table. Character codes are referenced
     * by hex numbers because that's the most common way to
     * refer to them.
     *
     * Upper-case comments are identifiers from the Unicode database.
     * Lower- and mixed-case comments are the author's
     */
    private $_seoCharacterTable;

    public function __construct() {
      // load character table
      $this->_seoCharacterTable = array(
        mb_chr(0x0041, 'UTF-8') => 'A',
        mb_chr(0x0042, 'UTF-8') => 'B',
        mb_chr(0x0043, 'UTF-8') => 'C',
        mb_chr(0x0044, 'UTF-8') => 'D',
        mb_chr(0x0045, 'UTF-8') => 'E',
        mb_chr(0x0046, 'UTF-8') => 'F',
        mb_chr(0x0047, 'UTF-8') => 'G',
        mb_chr(0x0048, 'UTF-8') => 'H',
        mb_chr(0x0049, 'UTF-8') => 'I',
        mb_chr(0x004A, 'UTF-8') => 'J',
        mb_chr(0x004B, 'UTF-8') => 'K',
        mb_chr(0x004C, 'UTF-8') => 'L',
        mb_chr(0x004D, 'UTF-8') => 'M',
        mb_chr(0x004E, 'UTF-8') => 'N',
        mb_chr(0x004F, 'UTF-8') => 'O',
        mb_chr(0x0050, 'UTF-8') => 'P',
        mb_chr(0x0051, 'UTF-8') => 'Q',
        mb_chr(0x0052, 'UTF-8') => 'R',
        mb_chr(0x0053, 'UTF-8') => 'S',
        mb_chr(0x0054, 'UTF-8') => 'T',
        mb_chr(0x0055, 'UTF-8') => 'U',
        mb_chr(0x0056, 'UTF-8') => 'V',
        mb_chr(0x0057, 'UTF-8') => 'W',
        mb_chr(0x0058, 'UTF-8') => 'X',
        mb_chr(0x0059, 'UTF-8') => 'Y',
        mb_chr(0x005A, 'UTF-8') => 'Z',
        mb_chr(0x0061, 'UTF-8') => 'a',
        mb_chr(0x0062, 'UTF-8') => 'b',
        mb_chr(0x0063, 'UTF-8') => 'c',
        mb_chr(0x0064, 'UTF-8') => 'd',
        mb_chr(0x0065, 'UTF-8') => 'e',
        mb_chr(0x0066, 'UTF-8') => 'f',
        mb_chr(0x0067, 'UTF-8') => 'g',
        mb_chr(0x0068, 'UTF-8') => 'h',
        mb_chr(0x0069, 'UTF-8') => 'i',
        mb_chr(0x006A, 'UTF-8') => 'j',
        mb_chr(0x006B, 'UTF-8') => 'k',
        mb_chr(0x006C, 'UTF-8') => 'l',
        mb_chr(0x006D, 'UTF-8') => 'm',
        mb_chr(0x006E, 'UTF-8') => 'n',
        mb_chr(0x006F, 'UTF-8') => 'o',
        mb_chr(0x0070, 'UTF-8') => 'p',
        mb_chr(0x0071, 'UTF-8') => 'q',
        mb_chr(0x0072, 'UTF-8') => 'r',
        mb_chr(0x0073, 'UTF-8') => 's',
        mb_chr(0x0074, 'UTF-8') => 't',
        mb_chr(0x0075, 'UTF-8') => 'u',
        mb_chr(0x0076, 'UTF-8') => 'v',
        mb_chr(0x0077, 'UTF-8') => 'w',
        mb_chr(0x0078, 'UTF-8') => 'x',
        mb_chr(0x0079, 'UTF-8') => 'y',
        mb_chr(0x007A, 'UTF-8') => 'z',
        mb_chr(0x00AA, 'UTF-8') => 'a', // FEMININE ORDINAL INDICATOR
        mb_chr(0x00BA, 'UTF-8') => 'o', // MASCULINE ORDINAL INDICATOR
        mb_chr(0x00C0, 'UTF-8') => 'A', // LATIN CAPITAL LETTER A WITH GRAVE
        mb_chr(0x00C1, 'UTF-8') => 'A', // LATIN CAPITAL LETTER A WITH ACUTE
        mb_chr(0x00C2, 'UTF-8') => 'A', // LATIN CAPITAL LETTER A WITH CIRCUMFLEX
        mb_chr(0x00C3, 'UTF-8') => 'A', // LATIN CAPITAL LETTER A WITH TILDE
        mb_chr(0x00C4, 'UTF-8') => 'A', // LATIN CAPITAL LETTER A WITH DIAERESIS
        mb_chr(0x00C5, 'UTF-8') => 'A', // LATIN CAPITAL LETTER A WITH RING ABOVE
        mb_chr(0x00C6, 'UTF-8') => 'AE', // LATIN CAPITAL LETTER AE -- no decomposition
        mb_chr(0x00C7, 'UTF-8') => 'C', // LATIN CAPITAL LETTER C WITH CEDILLA
        mb_chr(0x00C8, 'UTF-8') => 'E', // LATIN CAPITAL LETTER E WITH GRAVE
        mb_chr(0x00C9, 'UTF-8') => 'E', // LATIN CAPITAL LETTER E WITH ACUTE
        mb_chr(0x00CA, 'UTF-8') => 'E', // LATIN CAPITAL LETTER E WITH CIRCUMFLEX
        mb_chr(0x00CB, 'UTF-8') => 'E', // LATIN CAPITAL LETTER E WITH DIAERESIS
        mb_chr(0x00CC, 'UTF-8') => 'I', // LATIN CAPITAL LETTER I WITH GRAVE
        mb_chr(0x00CD, 'UTF-8') => 'I', // LATIN CAPITAL LETTER I WITH ACUTE
        mb_chr(0x00CE, 'UTF-8') => 'I', // LATIN CAPITAL LETTER I WITH CIRCUMFLEX
        mb_chr(0x00CF, 'UTF-8') => 'I', // LATIN CAPITAL LETTER I WITH DIAERESIS
        mb_chr(0x00D0, 'UTF-8') => 'D', // LATIN CAPITAL LETTER ETH -- no decomposition                   // Eth [D for Vietnamese]
        mb_chr(0x00D1, 'UTF-8') => 'N', // LATIN CAPITAL LETTER N WITH TILDE
        mb_chr(0x00D2, 'UTF-8') => 'O', // LATIN CAPITAL LETTER O WITH GRAVE
        mb_chr(0x00D3, 'UTF-8') => 'O', // LATIN CAPITAL LETTER O WITH ACUTE
        mb_chr(0x00D4, 'UTF-8') => 'O', // LATIN CAPITAL LETTER O WITH CIRCUMFLEX
        mb_chr(0x00D5, 'UTF-8') => 'O', // LATIN CAPITAL LETTER O WITH TILDE
        mb_chr(0x00D6, 'UTF-8') => 'O', // LATIN CAPITAL LETTER O WITH DIAERESIS
        mb_chr(0x00D8, 'UTF-8') => 'O', // LATIN CAPITAL LETTER O WITH STROKE -- no decomposition
        mb_chr(0x00D9, 'UTF-8') => 'U', // LATIN CAPITAL LETTER U WITH GRAVE
        mb_chr(0x00DA, 'UTF-8') => 'U', // LATIN CAPITAL LETTER U WITH ACUTE
        mb_chr(0x00DB, 'UTF-8') => 'U', // LATIN CAPITAL LETTER U WITH CIRCUMFLEX
        mb_chr(0x00DC, 'UTF-8') => 'U', // LATIN CAPITAL LETTER U WITH DIAERESIS
        mb_chr(0x00DD, 'UTF-8') => 'Y', // LATIN CAPITAL LETTER Y WITH ACUTE
        mb_chr(0x00DE, 'UTF-8') => 'Th', // LATIN CAPITAL LETTER THORN -- no decomposition                 // Thorn - Could be nothing other than thorn
        mb_chr(0x00DF, 'UTF-8') => 's', // LATIN SMALL LETTER SHARP S -- no decomposition
        mb_chr(0x00E0, 'UTF-8') => 'a', // LATIN SMALL LETTER A WITH GRAVE
        mb_chr(0x00E1, 'UTF-8') => 'a', // LATIN SMALL LETTER A WITH ACUTE
        mb_chr(0x00E2, 'UTF-8') => 'a', // LATIN SMALL LETTER A WITH CIRCUMFLEX
        mb_chr(0x00E3, 'UTF-8') => 'a', // LATIN SMALL LETTER A WITH TILDE
        mb_chr(0x00E4, 'UTF-8') => 'a', // LATIN SMALL LETTER A WITH DIAERESIS
        mb_chr(0x00E5, 'UTF-8') => 'a', // LATIN SMALL LETTER A WITH RING ABOVE
        mb_chr(0x00E6, 'UTF-8') => 'ae', // LATIN SMALL LETTER AE -- no decomposition
        mb_chr(0x00E7, 'UTF-8') => 'c', // LATIN SMALL LETTER C WITH CEDILLA
        mb_chr(0x00E8, 'UTF-8') => 'e', // LATIN SMALL LETTER E WITH GRAVE
        mb_chr(0x00E9, 'UTF-8') => 'e', // LATIN SMALL LETTER E WITH ACUTE
        mb_chr(0x00EA, 'UTF-8') => 'e', // LATIN SMALL LETTER E WITH CIRCUMFLEX
        mb_chr(0x00EB, 'UTF-8') => 'e', // LATIN SMALL LETTER E WITH DIAERESIS
        mb_chr(0x00EC, 'UTF-8') => 'i', // LATIN SMALL LETTER I WITH GRAVE
        mb_chr(0x00ED, 'UTF-8') => 'i', // LATIN SMALL LETTER I WITH ACUTE
        mb_chr(0x00EE, 'UTF-8') => 'i', // LATIN SMALL LETTER I WITH CIRCUMFLEX
        mb_chr(0x00EF, 'UTF-8') => 'i', // LATIN SMALL LETTER I WITH DIAERESIS
        mb_chr(0x00F0, 'UTF-8') => 'd', // LATIN SMALL LETTER ETH -- no decomposition                     // small eth]: 'd' for benefit of Vietnamese
        mb_chr(0x00F1, 'UTF-8') => 'n', // LATIN SMALL LETTER N WITH TILDE
        mb_chr(0x00F2, 'UTF-8') => 'o', // LATIN SMALL LETTER O WITH GRAVE
        mb_chr(0x00F3, 'UTF-8') => 'o', // LATIN SMALL LETTER O WITH ACUTE
        mb_chr(0x00F4, 'UTF-8') => 'o', // LATIN SMALL LETTER O WITH CIRCUMFLEX
        mb_chr(0x00F5, 'UTF-8') => 'o', // LATIN SMALL LETTER O WITH TILDE
        mb_chr(0x00F6, 'UTF-8') => 'o', // LATIN SMALL LETTER O WITH DIAERESIS
        mb_chr(0x00F8, 'UTF-8') => 'o', // LATIN SMALL LETTER O WITH STROKE -- no decompo
        mb_chr(0x00F9, 'UTF-8') => 'u', // LATIN SMALL LETTER U WITH GRAVE
        mb_chr(0x00FA, 'UTF-8') => 'u', // LATIN SMALL LETTER U WITH ACUTE
        mb_chr(0x00FB, 'UTF-8') => 'u', // LATIN SMALL LETTER U WITH CIRCUMFLEX
        mb_chr(0x00FC, 'UTF-8') => 'u', // LATIN SMALL LETTER U WITH DIAERESIS
        mb_chr(0x00FD, 'UTF-8') => 'y', // LATIN SMALL LETTER Y WITH ACUTE
        mb_chr(0x00FE, 'UTF-8') => 'th', // LATIN SMALL LETTER THORN -- no decomposition                   // Small thorn
        mb_chr(0x00FF, 'UTF-8') => 'y', // LATIN SMALL LETTER Y WITH DIAERESIS
        mb_chr(0x0100, 'UTF-8') => 'A', // LATIN CAPITAL LETTER A WITH MACRON
        mb_chr(0x0101, 'UTF-8') => 'a', // LATIN SMALL LETTER A WITH MACRON
        mb_chr(0x0102, 'UTF-8') => 'A', // LATIN CAPITAL LETTER A WITH BREVE
        mb_chr(0x0103, 'UTF-8') => 'a', // LATIN SMALL LETTER A WITH BREVE
        mb_chr(0x0104, 'UTF-8') => 'A', // LATIN CAPITAL LETTER A WITH OGONEK
        mb_chr(0x0105, 'UTF-8') => 'a', // LATIN SMALL LETTER A WITH OGONEK
        mb_chr(0x0106, 'UTF-8') => 'C', // LATIN CAPITAL LETTER C WITH ACUTE
        mb_chr(0x0107, 'UTF-8') => 'c', // LATIN SMALL LETTER C WITH ACUTE
        mb_chr(0x0108, 'UTF-8') => 'C', // LATIN CAPITAL LETTER C WITH CIRCUMFLEX
        mb_chr(0x0109, 'UTF-8') => 'c', // LATIN SMALL LETTER C WITH CIRCUMFLEX
        mb_chr(0x010A, 'UTF-8') => 'C', // LATIN CAPITAL LETTER C WITH DOT ABOVE
        mb_chr(0x010B, 'UTF-8') => 'c', // LATIN SMALL LETTER C WITH DOT ABOVE
        mb_chr(0x010C, 'UTF-8') => 'C', // LATIN CAPITAL LETTER C WITH CARON
        mb_chr(0x010D, 'UTF-8') => 'c', // LATIN SMALL LETTER C WITH CARON
        mb_chr(0x010E, 'UTF-8') => 'D', // LATIN CAPITAL LETTER D WITH CARON
        mb_chr(0x010F, 'UTF-8') => 'd', // LATIN SMALL LETTER D WITH CARON
        mb_chr(0x0110, 'UTF-8') => 'D', // LATIN CAPITAL LETTER D WITH STROKE -- no decomposition         // Capital D with stroke
        mb_chr(0x0111, 'UTF-8') => 'd', // LATIN SMALL LETTER D WITH STROKE -- no decomposition           // small D with stroke
        mb_chr(0x0112, 'UTF-8') => 'E', // LATIN CAPITAL LETTER E WITH MACRON
        mb_chr(0x0113, 'UTF-8') => 'e', // LATIN SMALL LETTER E WITH MACRON
        mb_chr(0x0114, 'UTF-8') => 'E', // LATIN CAPITAL LETTER E WITH BREVE
        mb_chr(0x0115, 'UTF-8') => 'e', // LATIN SMALL LETTER E WITH BREVE
        mb_chr(0x0116, 'UTF-8') => 'E', // LATIN CAPITAL LETTER E WITH DOT ABOVE
        mb_chr(0x0117, 'UTF-8') => 'e', // LATIN SMALL LETTER E WITH DOT ABOVE
        mb_chr(0x0118, 'UTF-8') => 'E', // LATIN CAPITAL LETTER E WITH OGONEK
        mb_chr(0x0119, 'UTF-8') => 'e', // LATIN SMALL LETTER E WITH OGONEK
        mb_chr(0x011A, 'UTF-8') => 'E', // LATIN CAPITAL LETTER E WITH CARON
        mb_chr(0x011B, 'UTF-8') => 'e', // LATIN SMALL LETTER E WITH CARON
        mb_chr(0x011C, 'UTF-8') => 'G', // LATIN CAPITAL LETTER G WITH CIRCUMFLEX
        mb_chr(0x011D, 'UTF-8') => 'g', // LATIN SMALL LETTER G WITH CIRCUMFLEX
        mb_chr(0x011E, 'UTF-8') => 'G', // LATIN CAPITAL LETTER G WITH BREVE
        mb_chr(0x011F, 'UTF-8') => 'g', // LATIN SMALL LETTER G WITH BREVE
        mb_chr(0x0120, 'UTF-8') => 'G', // LATIN CAPITAL LETTER G WITH DOT ABOVE
        mb_chr(0x0121, 'UTF-8') => 'g', // LATIN SMALL LETTER G WITH DOT ABOVE
        mb_chr(0x0122, 'UTF-8') => 'G', // LATIN CAPITAL LETTER G WITH CEDILLA
        mb_chr(0x0123, 'UTF-8') => 'g', // LATIN SMALL LETTER G WITH CEDILLA
        mb_chr(0x0124, 'UTF-8') => 'H', // LATIN CAPITAL LETTER H WITH CIRCUMFLEX
        mb_chr(0x0125, 'UTF-8') => 'h', // LATIN SMALL LETTER H WITH CIRCUMFLEX
        mb_chr(0x0126, 'UTF-8') => 'H', // LATIN CAPITAL LETTER H WITH STROKE -- no decomposition
        mb_chr(0x0127, 'UTF-8') => 'h', // LATIN SMALL LETTER H WITH STROKE -- no decomposition
        mb_chr(0x0128, 'UTF-8') => 'I', // LATIN CAPITAL LETTER I WITH TILDE
        mb_chr(0x0129, 'UTF-8') => 'i', // LATIN SMALL LETTER I WITH TILDE
        mb_chr(0x012A, 'UTF-8') => 'I', // LATIN CAPITAL LETTER I WITH MACRON
        mb_chr(0x012B, 'UTF-8') => 'i', // LATIN SMALL LETTER I WITH MACRON
        mb_chr(0x012C, 'UTF-8') => 'I', // LATIN CAPITAL LETTER I WITH BREVE
        mb_chr(0x012D, 'UTF-8') => 'i', // LATIN SMALL LETTER I WITH BREVE
        mb_chr(0x012E, 'UTF-8') => 'I', // LATIN CAPITAL LETTER I WITH OGONEK
        mb_chr(0x012F, 'UTF-8') => 'i', // LATIN SMALL LETTER I WITH OGONEK
        mb_chr(0x0130, 'UTF-8') => 'I', // LATIN CAPITAL LETTER I WITH DOT ABOVE
        mb_chr(0x0131, 'UTF-8') => 'i', // LATIN SMALL LETTER DOTLESS I -- no decomposition
        mb_chr(0x0132, 'UTF-8') => 'I', // LATIN CAPITAL LIGATURE IJ
        mb_chr(0x0133, 'UTF-8') => 'i', // LATIN SMALL LIGATURE IJ
        mb_chr(0x0134, 'UTF-8') => 'J', // LATIN CAPITAL LETTER J WITH CIRCUMFLEX
        mb_chr(0x0135, 'UTF-8') => 'j', // LATIN SMALL LETTER J WITH CIRCUMFLEX
        mb_chr(0x0136, 'UTF-8') => 'K', // LATIN CAPITAL LETTER K WITH CEDILLA
        mb_chr(0x0137, 'UTF-8') => 'k', // LATIN SMALL LETTER K WITH CEDILLA
        mb_chr(0x0138, 'UTF-8') => 'k', // LATIN SMALL LETTER KRA -- no decomposition
        mb_chr(0x0139, 'UTF-8') => 'L', // LATIN CAPITAL LETTER L WITH ACUTE
        mb_chr(0x013A, 'UTF-8') => 'l', // LATIN SMALL LETTER L WITH ACUTE
        mb_chr(0x013B, 'UTF-8') => 'L', // LATIN CAPITAL LETTER L WITH CEDILLA
        mb_chr(0x013C, 'UTF-8') => 'l', // LATIN SMALL LETTER L WITH CEDILLA
        mb_chr(0x013D, 'UTF-8') => 'L', // LATIN CAPITAL LETTER L WITH CARON
        mb_chr(0x013E, 'UTF-8') => 'l', // LATIN SMALL LETTER L WITH CARON
        mb_chr(0x013F, 'UTF-8') => 'L', // LATIN CAPITAL LETTER L WITH MIDDLE DOT
        mb_chr(0x0140, 'UTF-8') => 'l', // LATIN SMALL LETTER L WITH MIDDLE DOT
        mb_chr(0x0141, 'UTF-8') => 'L', // LATIN CAPITAL LETTER L WITH STROKE -- no decomposition
        mb_chr(0x0142, 'UTF-8') => 'l', // LATIN SMALL LETTER L WITH STROKE -- no decomposition
        mb_chr(0x0143, 'UTF-8') => 'N', // LATIN CAPITAL LETTER N WITH ACUTE
        mb_chr(0x0144, 'UTF-8') => 'n', // LATIN SMALL LETTER N WITH ACUTE
        mb_chr(0x0145, 'UTF-8') => 'N', // LATIN CAPITAL LETTER N WITH CEDILLA
        mb_chr(0x0146, 'UTF-8') => 'n', // LATIN SMALL LETTER N WITH CEDILLA
        mb_chr(0x0147, 'UTF-8') => 'N', // LATIN CAPITAL LETTER N WITH CARON
        mb_chr(0x0148, 'UTF-8') => 'n', // LATIN SMALL LETTER N WITH CARON
        mb_chr(0x0149, 'UTF-8') => '\'n', // LATIN SMALL LETTER N PRECEDED BY APOSTROPHE
        mb_chr(0x014A, 'UTF-8') => 'NG', // LATIN CAPITAL LETTER ENG -- no decomposition
        mb_chr(0x014B, 'UTF-8') => 'ng', // LATIN SMALL LETTER ENG -- no decomposition
        mb_chr(0x014C, 'UTF-8') => 'O', // LATIN CAPITAL LETTER O WITH MACRON
        mb_chr(0x014D, 'UTF-8') => 'o', // LATIN SMALL LETTER O WITH MACRON
        mb_chr(0x014E, 'UTF-8') => 'O', // LATIN CAPITAL LETTER O WITH BREVE
        mb_chr(0x014F, 'UTF-8') => 'o', // LATIN SMALL LETTER O WITH BREVE
        mb_chr(0x0150, 'UTF-8') => 'O', // LATIN CAPITAL LETTER O WITH DOUBLE ACUTE
        mb_chr(0x0151, 'UTF-8') => 'o', // LATIN SMALL LETTER O WITH DOUBLE ACUTE
        mb_chr(0x0152, 'UTF-8') => 'OE', // LATIN CAPITAL LIGATURE OE -- no decomposition
        mb_chr(0x0153, 'UTF-8') => 'oe', // LATIN SMALL LIGATURE OE -- no decomposition
        mb_chr(0x0154, 'UTF-8') => 'R', // LATIN CAPITAL LETTER R WITH ACUTE
        mb_chr(0x0155, 'UTF-8') => 'r', // LATIN SMALL LETTER R WITH ACUTE
        mb_chr(0x0156, 'UTF-8') => 'R', // LATIN CAPITAL LETTER R WITH CEDILLA
        mb_chr(0x0157, 'UTF-8') => 'r', // LATIN SMALL LETTER R WITH CEDILLA
        mb_chr(0x0158, 'UTF-8') => 'R', // LATIN CAPITAL LETTER R WITH CARON
        mb_chr(0x0159, 'UTF-8') => 'r', // LATIN SMALL LETTER R WITH CARON
        mb_chr(0x015A, 'UTF-8') => 'S', // LATIN CAPITAL LETTER S WITH ACUTE
        mb_chr(0x015B, 'UTF-8') => 's', // LATIN SMALL LETTER S WITH ACUTE
        mb_chr(0x015C, 'UTF-8') => 'S', // LATIN CAPITAL LETTER S WITH CIRCUMFLEX
        mb_chr(0x015D, 'UTF-8') => 's', // LATIN SMALL LETTER S WITH CIRCUMFLEX
        mb_chr(0x015E, 'UTF-8') => 'S', // LATIN CAPITAL LETTER S WITH CEDILLA
        mb_chr(0x015F, 'UTF-8') => 's', // LATIN SMALL LETTER S WITH CEDILLA
        mb_chr(0x0160, 'UTF-8') => 'S', // LATIN CAPITAL LETTER S WITH CARON
        mb_chr(0x0161, 'UTF-8') => 's', // LATIN SMALL LETTER S WITH CARON
        mb_chr(0x0162, 'UTF-8') => 'T', // LATIN CAPITAL LETTER T WITH CEDILLA
        mb_chr(0x0163, 'UTF-8') => 't', // LATIN SMALL LETTER T WITH CEDILLA
        mb_chr(0x0164, 'UTF-8') => 'T', // LATIN CAPITAL LETTER T WITH CARON
        mb_chr(0x0165, 'UTF-8') => 't', // LATIN SMALL LETTER T WITH CARON
        mb_chr(0x0166, 'UTF-8') => 'T', // LATIN CAPITAL LETTER T WITH STROKE -- no decomposition
        mb_chr(0x0167, 'UTF-8') => 't', // LATIN SMALL LETTER T WITH STROKE -- no decomposition
        mb_chr(0x0168, 'UTF-8') => 'U', // LATIN CAPITAL LETTER U WITH TILDE
        mb_chr(0x0169, 'UTF-8') => 'u', // LATIN SMALL LETTER U WITH TILDE
        mb_chr(0x016A, 'UTF-8') => 'U', // LATIN CAPITAL LETTER U WITH MACRON
        mb_chr(0x016B, 'UTF-8') => 'u', // LATIN SMALL LETTER U WITH MACRON
        mb_chr(0x016C, 'UTF-8') => 'U', // LATIN CAPITAL LETTER U WITH BREVE
        mb_chr(0x016D, 'UTF-8') => 'u', // LATIN SMALL LETTER U WITH BREVE
        mb_chr(0x016E, 'UTF-8') => 'U', // LATIN CAPITAL LETTER U WITH RING ABOVE
        mb_chr(0x016F, 'UTF-8') => 'u', // LATIN SMALL LETTER U WITH RING ABOVE
        mb_chr(0x0170, 'UTF-8') => 'U', // LATIN CAPITAL LETTER U WITH DOUBLE ACUTE
        mb_chr(0x0171, 'UTF-8') => 'u', // LATIN SMALL LETTER U WITH DOUBLE ACUTE
        mb_chr(0x0172, 'UTF-8') => 'U', // LATIN CAPITAL LETTER U WITH OGONEK
        mb_chr(0x0173, 'UTF-8') => 'u', // LATIN SMALL LETTER U WITH OGONEK
        mb_chr(0x0174, 'UTF-8') => 'W', // LATIN CAPITAL LETTER W WITH CIRCUMFLEX
        mb_chr(0x0175, 'UTF-8') => 'w', // LATIN SMALL LETTER W WITH CIRCUMFLEX
        mb_chr(0x0176, 'UTF-8') => 'Y', // LATIN CAPITAL LETTER Y WITH CIRCUMFLEX
        mb_chr(0x0177, 'UTF-8') => 'y', // LATIN SMALL LETTER Y WITH CIRCUMFLEX
        mb_chr(0x0178, 'UTF-8') => 'Y', // LATIN CAPITAL LETTER Y WITH DIAERESIS
        mb_chr(0x0179, 'UTF-8') => 'Z', // LATIN CAPITAL LETTER Z WITH ACUTE
        mb_chr(0x017A, 'UTF-8') => 'z', // LATIN SMALL LETTER Z WITH ACUTE
        mb_chr(0x017B, 'UTF-8') => 'Z', // LATIN CAPITAL LETTER Z WITH DOT ABOVE
        mb_chr(0x017C, 'UTF-8') => 'z', // LATIN SMALL LETTER Z WITH DOT ABOVE
        mb_chr(0x017D, 'UTF-8') => 'Z', // LATIN CAPITAL LETTER Z WITH CARON
        mb_chr(0x017E, 'UTF-8') => 'z', // LATIN SMALL LETTER Z WITH CARON
        mb_chr(0x017F, 'UTF-8') => 's', // LATIN SMALL LETTER LONG S
        mb_chr(0x0180, 'UTF-8') => 'b', // LATIN SMALL LETTER B WITH STROKE -- no decomposition
        mb_chr(0x0181, 'UTF-8') => 'B', // LATIN CAPITAL LETTER B WITH HOOK -- no decomposition
        mb_chr(0x0182, 'UTF-8') => 'B', // LATIN CAPITAL LETTER B WITH TOPBAR -- no decomposition
        mb_chr(0x0183, 'UTF-8') => 'b', // LATIN SMALL LETTER B WITH TOPBAR -- no decomposition
        mb_chr(0x0184, 'UTF-8') => '6', // LATIN CAPITAL LETTER TONE SIX -- no decomposition
        mb_chr(0x0185, 'UTF-8') => '6', // LATIN SMALL LETTER TONE SIX -- no decomposition
        mb_chr(0x0186, 'UTF-8') => 'O', // LATIN CAPITAL LETTER OPEN O -- no decomposition
        mb_chr(0x0187, 'UTF-8') => 'C', // LATIN CAPITAL LETTER C WITH HOOK -- no decomposition
        mb_chr(0x0188, 'UTF-8') => 'c', // LATIN SMALL LETTER C WITH HOOK -- no decomposition
        mb_chr(0x0189, 'UTF-8') => 'D', // LATIN CAPITAL LETTER AFRICAN D -- no decomposition
        mb_chr(0x018A, 'UTF-8') => 'D', // LATIN CAPITAL LETTER D WITH HOOK -- no decomposition
        mb_chr(0x018B, 'UTF-8') => 'D', // LATIN CAPITAL LETTER D WITH TOPBAR -- no decomposition
        mb_chr(0x018C, 'UTF-8') => 'd', // LATIN SMALL LETTER D WITH TOPBAR -- no decomposition
        mb_chr(0x018D, 'UTF-8') => 'd', // LATIN SMALL LETTER TURNED DELTA -- no decomposition
        mb_chr(0x018E, 'UTF-8') => 'E', // LATIN CAPITAL LETTER REVERSED E -- no decomposition
        mb_chr(0x018F, 'UTF-8') => 'E', // LATIN CAPITAL LETTER SCHWA -- no decomposition
        mb_chr(0x0190, 'UTF-8') => 'E', // LATIN CAPITAL LETTER OPEN E -- no decomposition
        mb_chr(0x0191, 'UTF-8') => 'F', // LATIN CAPITAL LETTER F WITH HOOK -- no decomposition
        mb_chr(0x0192, 'UTF-8') => 'f', // LATIN SMALL LETTER F WITH HOOK -- no decomposition
        mb_chr(0x0193, 'UTF-8') => 'G', // LATIN CAPITAL LETTER G WITH HOOK -- no decomposition
        mb_chr(0x0194, 'UTF-8') => 'G', // LATIN CAPITAL LETTER GAMMA -- no decomposition
        mb_chr(0x0195, 'UTF-8') => 'hv', // LATIN SMALL LETTER HV -- no decomposition
        mb_chr(0x0196, 'UTF-8') => 'I', // LATIN CAPITAL LETTER IOTA -- no decomposition
        mb_chr(0x0197, 'UTF-8') => 'I', // LATIN CAPITAL LETTER I WITH STROKE -- no decomposition
        mb_chr(0x0198, 'UTF-8') => 'K', // LATIN CAPITAL LETTER K WITH HOOK -- no decomposition
        mb_chr(0x0199, 'UTF-8') => 'k', // LATIN SMALL LETTER K WITH HOOK -- no decomposition
        mb_chr(0x019A, 'UTF-8') => 'l', // LATIN SMALL LETTER L WITH BAR -- no decomposition
        mb_chr(0x019B, 'UTF-8') => 'l', // LATIN SMALL LETTER LAMBDA WITH STROKE -- no decomposition
        mb_chr(0x019C, 'UTF-8') => 'M', // LATIN CAPITAL LETTER TURNED M -- no decomposition
        mb_chr(0x019D, 'UTF-8') => 'N', // LATIN CAPITAL LETTER N WITH LEFT HOOK -- no decomposition
        mb_chr(0x019E, 'UTF-8') => 'n', // LATIN SMALL LETTER N WITH LONG RIGHT LEG -- no decomposition
        mb_chr(0x019F, 'UTF-8') => 'O', // LATIN CAPITAL LETTER O WITH MIDDLE TILDE -- no decomposition
        mb_chr(0x01A0, 'UTF-8') => 'O', // LATIN CAPITAL LETTER O WITH HORN
        mb_chr(0x01A1, 'UTF-8') => 'o', // LATIN SMALL LETTER O WITH HORN
        mb_chr(0x01A2, 'UTF-8') => 'OI', // LATIN CAPITAL LETTER OI -- no decomposition
        mb_chr(0x01A3, 'UTF-8') => 'oi', // LATIN SMALL LETTER OI -- no decomposition
        mb_chr(0x01A4, 'UTF-8') => 'P', // LATIN CAPITAL LETTER P WITH HOOK -- no decomposition
        mb_chr(0x01A5, 'UTF-8') => 'p', // LATIN SMALL LETTER P WITH HOOK -- no decomposition
        mb_chr(0x01A6, 'UTF-8') => 'YR', // LATIN LETTER YR -- no decomposition
        mb_chr(0x01A7, 'UTF-8') => '2', // LATIN CAPITAL LETTER TONE TWO -- no decomposition
        mb_chr(0x01A8, 'UTF-8') => '2', // LATIN SMALL LETTER TONE TWO -- no decomposition
        mb_chr(0x01A9, 'UTF-8') => 'S', // LATIN CAPITAL LETTER ESH -- no decomposition
        mb_chr(0x01AA, 'UTF-8') => 's', // LATIN LETTER REVERSED ESH LOOP -- no decomposition
        mb_chr(0x01AB, 'UTF-8') => 't', // LATIN SMALL LETTER T WITH PALATAL HOOK -- no decomposition
        mb_chr(0x01AC, 'UTF-8') => 'T', // LATIN CAPITAL LETTER T WITH HOOK -- no decomposition
        mb_chr(0x01AD, 'UTF-8') => 't', // LATIN SMALL LETTER T WITH HOOK -- no decomposition
        mb_chr(0x01AE, 'UTF-8') => 'T', // LATIN CAPITAL LETTER T WITH RETROFLEX HOOK -- no decomposition
        mb_chr(0x01AF, 'UTF-8') => 'U', // LATIN CAPITAL LETTER U WITH HORN
        mb_chr(0x01B0, 'UTF-8') => 'u', // LATIN SMALL LETTER U WITH HORN
        mb_chr(0x01B1, 'UTF-8') => 'u', // LATIN CAPITAL LETTER UPSILON -- no decomposition
        mb_chr(0x01B2, 'UTF-8') => 'V', // LATIN CAPITAL LETTER V WITH HOOK -- no decomposition
        mb_chr(0x01B3, 'UTF-8') => 'Y', // LATIN CAPITAL LETTER Y WITH HOOK -- no decomposition
        mb_chr(0x01B4, 'UTF-8') => 'y', // LATIN SMALL LETTER Y WITH HOOK -- no decomposition
        mb_chr(0x01B5, 'UTF-8') => 'Z', // LATIN CAPITAL LETTER Z WITH STROKE -- no decomposition
        mb_chr(0x01B6, 'UTF-8') => 'z', // LATIN SMALL LETTER Z WITH STROKE -- no decomposition
        mb_chr(0x01B7, 'UTF-8') => 'Z', // LATIN CAPITAL LETTER EZH -- no decomposition
        mb_chr(0x01B8, 'UTF-8') => 'Z', // LATIN CAPITAL LETTER EZH REVERSED -- no decomposition
        mb_chr(0x01B9, 'UTF-8') => 'Z', // LATIN SMALL LETTER EZH REVERSED -- no decomposition
        mb_chr(0x01BA, 'UTF-8') => 'z', // LATIN SMALL LETTER EZH WITH TAIL -- no decomposition
        mb_chr(0x01BB, 'UTF-8') => '2', // LATIN LETTER TWO WITH STROKE -- no decomposition
        mb_chr(0x01BC, 'UTF-8') => '5', // LATIN CAPITAL LETTER TONE FIVE -- no decomposition
        mb_chr(0x01BD, 'UTF-8') => '5', // LATIN SMALL LETTER TONE FIVE -- no decomposition
        // mb_chr(0x01BE, 'UTF-8') => '´', // LATIN LETTER INVERTED GLOTTAL STOP WITH STROKE -- no decomposition
        mb_chr(0x01BF, 'UTF-8') => 'w', // LATIN LETTER WYNN -- no decomposition
        mb_chr(0x01C0, 'UTF-8') => '!', // LATIN LETTER DENTAL CLICK -- no decomposition
        mb_chr(0x01C1, 'UTF-8') => '!', // LATIN LETTER LATERAL CLICK -- no decomposition
        mb_chr(0x01C2, 'UTF-8') => '!', // LATIN LETTER ALVEOLAR CLICK -- no decomposition
        mb_chr(0x01C3, 'UTF-8') => '!', // LATIN LETTER RETROFLEX CLICK -- no decomposition
        mb_chr(0x01C4, 'UTF-8') => 'DZ', // LATIN CAPITAL LETTER DZ WITH CARON
        mb_chr(0x01C5, 'UTF-8') => 'DZ', // LATIN CAPITAL LETTER D WITH SMALL LETTER Z WITH CARON
        mb_chr(0x01C6, 'UTF-8') => 'd', // LATIN SMALL LETTER DZ WITH CARON
        mb_chr(0x01C7, 'UTF-8') => 'Lj', // LATIN CAPITAL LETTER LJ
        mb_chr(0x01C8, 'UTF-8') => 'Lj', // LATIN CAPITAL LETTER L WITH SMALL LETTER J
        mb_chr(0x01C9, 'UTF-8') => 'lj', // LATIN SMALL LETTER LJ
        mb_chr(0x01CA, 'UTF-8') => 'NJ', // LATIN CAPITAL LETTER NJ
        mb_chr(0x01CB, 'UTF-8') => 'NJ', // LATIN CAPITAL LETTER N WITH SMALL LETTER J
        mb_chr(0x01CC, 'UTF-8') => 'nj', // LATIN SMALL LETTER NJ
        mb_chr(0x01CD, 'UTF-8') => 'A', // LATIN CAPITAL LETTER A WITH CARON
        mb_chr(0x01CE, 'UTF-8') => 'a', // LATIN SMALL LETTER A WITH CARON
        mb_chr(0x01CF, 'UTF-8') => 'I', // LATIN CAPITAL LETTER I WITH CARON
        mb_chr(0x01D0, 'UTF-8') => 'i', // LATIN SMALL LETTER I WITH CARON
        mb_chr(0x01D1, 'UTF-8') => 'O', // LATIN CAPITAL LETTER O WITH CARON
        mb_chr(0x01D2, 'UTF-8') => 'o', // LATIN SMALL LETTER O WITH CARON
        mb_chr(0x01D3, 'UTF-8') => 'U', // LATIN CAPITAL LETTER U WITH CARON
        mb_chr(0x01D4, 'UTF-8') => 'u', // LATIN SMALL LETTER U WITH CARON
        mb_chr(0x01D5, 'UTF-8') => 'U', // LATIN CAPITAL LETTER U WITH DIAERESIS AND MACRON
        mb_chr(0x01D6, 'UTF-8') => 'u', // LATIN SMALL LETTER U WITH DIAERESIS AND MACRON
        mb_chr(0x01D7, 'UTF-8') => 'U', // LATIN CAPITAL LETTER U WITH DIAERESIS AND ACUTE
        mb_chr(0x01D8, 'UTF-8') => 'u', // LATIN SMALL LETTER U WITH DIAERESIS AND ACUTE
        mb_chr(0x01D9, 'UTF-8') => 'U', // LATIN CAPITAL LETTER U WITH DIAERESIS AND CARON
        mb_chr(0x01DA, 'UTF-8') => 'u', // LATIN SMALL LETTER U WITH DIAERESIS AND CARON
        mb_chr(0x01DB, 'UTF-8') => 'U', // LATIN CAPITAL LETTER U WITH DIAERESIS AND GRAVE
        mb_chr(0x01DC, 'UTF-8') => 'u', // LATIN SMALL LETTER U WITH DIAERESIS AND GRAVE
        mb_chr(0x01DD, 'UTF-8') => 'e', // LATIN SMALL LETTER TURNED E -- no decomposition
        mb_chr(0x01DE, 'UTF-8') => 'A', // LATIN CAPITAL LETTER A WITH DIAERESIS AND MACRON
        mb_chr(0x01DF, 'UTF-8') => 'a', // LATIN SMALL LETTER A WITH DIAERESIS AND MACRON
        mb_chr(0x01E0, 'UTF-8') => 'A', // LATIN CAPITAL LETTER A WITH DOT ABOVE AND MACRON
        mb_chr(0x01E1, 'UTF-8') => 'a', // LATIN SMALL LETTER A WITH DOT ABOVE AND MACRON
        mb_chr(0x01E2, 'UTF-8') => 'AE', // LATIN CAPITAL LETTER AE WITH MACRON
        mb_chr(0x01E3, 'UTF-8') => 'ae', // LATIN SMALL LETTER AE WITH MACRON
        mb_chr(0x01E4, 'UTF-8') => 'G', // LATIN CAPITAL LETTER G WITH STROKE -- no decomposition
        mb_chr(0x01E5, 'UTF-8') => 'g', // LATIN SMALL LETTER G WITH STROKE -- no decomposition
        mb_chr(0x01E6, 'UTF-8') => 'G', // LATIN CAPITAL LETTER G WITH CARON
        mb_chr(0x01E7, 'UTF-8') => 'g', // LATIN SMALL LETTER G WITH CARON
        mb_chr(0x01E8, 'UTF-8') => 'K', // LATIN CAPITAL LETTER K WITH CARON
        mb_chr(0x01E9, 'UTF-8') => 'k', // LATIN SMALL LETTER K WITH CARON
        mb_chr(0x01EA, 'UTF-8') => 'O', // LATIN CAPITAL LETTER O WITH OGONEK
        mb_chr(0x01EB, 'UTF-8') => 'o', // LATIN SMALL LETTER O WITH OGONEK
        mb_chr(0x01EC, 'UTF-8') => 'O', // LATIN CAPITAL LETTER O WITH OGONEK AND MACRON
        mb_chr(0x01ED, 'UTF-8') => 'o', // LATIN SMALL LETTER O WITH OGONEK AND MACRON
        mb_chr(0x01EE, 'UTF-8') => 'Z', // LATIN CAPITAL LETTER EZH WITH CARON
        mb_chr(0x01EF, 'UTF-8') => 'Z', // LATIN SMALL LETTER EZH WITH CARON
        mb_chr(0x01F0, 'UTF-8') => 'j', // LATIN SMALL LETTER J WITH CARON
        mb_chr(0x01F1, 'UTF-8') => 'DZ', // LATIN CAPITAL LETTER DZ
        mb_chr(0x01F2, 'UTF-8') => 'DZ', // LATIN CAPITAL LETTER D WITH SMALL LETTER Z
        mb_chr(0x01F3, 'UTF-8') => 'dz', // LATIN SMALL LETTER DZ
        mb_chr(0x01F4, 'UTF-8') => 'G', // LATIN CAPITAL LETTER G WITH ACUTE
        mb_chr(0x01F5, 'UTF-8') => 'g', // LATIN SMALL LETTER G WITH ACUTE
        mb_chr(0x01F6, 'UTF-8') => 'hv', // LATIN CAPITAL LETTER HWAIR -- no decomposition
        mb_chr(0x01F7, 'UTF-8') => 'w', // LATIN CAPITAL LETTER WYNN -- no decomposition
        mb_chr(0x01F8, 'UTF-8') => 'N', // LATIN CAPITAL LETTER N WITH GRAVE
        mb_chr(0x01F9, 'UTF-8') => 'n', // LATIN SMALL LETTER N WITH GRAVE
        mb_chr(0x01FA, 'UTF-8') => 'A', // LATIN CAPITAL LETTER A WITH RING ABOVE AND ACUTE
        mb_chr(0x01FB, 'UTF-8') => 'a', // LATIN SMALL LETTER A WITH RING ABOVE AND ACUTE
        mb_chr(0x01FC, 'UTF-8') => 'AE', // LATIN CAPITAL LETTER AE WITH ACUTE
        mb_chr(0x01FD, 'UTF-8') => 'ae', // LATIN SMALL LETTER AE WITH ACUTE
        mb_chr(0x01FE, 'UTF-8') => 'O', // LATIN CAPITAL LETTER O WITH STROKE AND ACUTE
        mb_chr(0x01FF, 'UTF-8') => 'o', // LATIN SMALL LETTER O WITH STROKE AND ACUTE
        mb_chr(0x0200, 'UTF-8') => 'A', // LATIN CAPITAL LETTER A WITH DOUBLE GRAVE
        mb_chr(0x0201, 'UTF-8') => 'a', // LATIN SMALL LETTER A WITH DOUBLE GRAVE
        mb_chr(0x0202, 'UTF-8') => 'A', // LATIN CAPITAL LETTER A WITH INVERTED BREVE
        mb_chr(0x0203, 'UTF-8') => 'a', // LATIN SMALL LETTER A WITH INVERTED BREVE
        mb_chr(0x0204, 'UTF-8') => 'E', // LATIN CAPITAL LETTER E WITH DOUBLE GRAVE
        mb_chr(0x0205, 'UTF-8') => 'e', // LATIN SMALL LETTER E WITH DOUBLE GRAVE
        mb_chr(0x0206, 'UTF-8') => 'E', // LATIN CAPITAL LETTER E WITH INVERTED BREVE
        mb_chr(0x0207, 'UTF-8') => 'e', // LATIN SMALL LETTER E WITH INVERTED BREVE
        mb_chr(0x0208, 'UTF-8') => 'I', // LATIN CAPITAL LETTER I WITH DOUBLE GRAVE
        mb_chr(0x0209, 'UTF-8') => 'i', // LATIN SMALL LETTER I WITH DOUBLE GRAVE
        mb_chr(0x020A, 'UTF-8') => 'I', // LATIN CAPITAL LETTER I WITH INVERTED BREVE
        mb_chr(0x020B, 'UTF-8') => 'i', // LATIN SMALL LETTER I WITH INVERTED BREVE
        mb_chr(0x020C, 'UTF-8') => 'O', // LATIN CAPITAL LETTER O WITH DOUBLE GRAVE
        mb_chr(0x020D, 'UTF-8') => 'o', // LATIN SMALL LETTER O WITH DOUBLE GRAVE
        mb_chr(0x020E, 'UTF-8') => 'O', // LATIN CAPITAL LETTER O WITH INVERTED BREVE
        mb_chr(0x020F, 'UTF-8') => 'o', // LATIN SMALL LETTER O WITH INVERTED BREVE
        mb_chr(0x0210, 'UTF-8') => 'R', // LATIN CAPITAL LETTER R WITH DOUBLE GRAVE
        mb_chr(0x0211, 'UTF-8') => 'r', // LATIN SMALL LETTER R WITH DOUBLE GRAVE
        mb_chr(0x0212, 'UTF-8') => 'R', // LATIN CAPITAL LETTER R WITH INVERTED BREVE
        mb_chr(0x0213, 'UTF-8') => 'r', // LATIN SMALL LETTER R WITH INVERTED BREVE
        mb_chr(0x0214, 'UTF-8') => 'U', // LATIN CAPITAL LETTER U WITH DOUBLE GRAVE
        mb_chr(0x0215, 'UTF-8') => 'u', // LATIN SMALL LETTER U WITH DOUBLE GRAVE
        mb_chr(0x0216, 'UTF-8') => 'U', // LATIN CAPITAL LETTER U WITH INVERTED BREVE
        mb_chr(0x0217, 'UTF-8') => 'u', // LATIN SMALL LETTER U WITH INVERTED BREVE
        mb_chr(0x0218, 'UTF-8') => 'S', // LATIN CAPITAL LETTER S WITH COMMA BELOW
        mb_chr(0x0219, 'UTF-8') => 's', // LATIN SMALL LETTER S WITH COMMA BELOW
        mb_chr(0x021A, 'UTF-8') => 'T', // LATIN CAPITAL LETTER T WITH COMMA BELOW
        mb_chr(0x021B, 'UTF-8') => 't', // LATIN SMALL LETTER T WITH COMMA BELOW
        mb_chr(0x021C, 'UTF-8') => 'Z', // LATIN CAPITAL LETTER YOGH -- no decomposition
        mb_chr(0x021D, 'UTF-8') => 'z', // LATIN SMALL LETTER YOGH -- no decomposition
        mb_chr(0x021E, 'UTF-8') => 'H', // LATIN CAPITAL LETTER H WITH CARON
        mb_chr(0x021F, 'UTF-8') => 'h', // LATIN SMALL LETTER H WITH CARON
        mb_chr(0x0220, 'UTF-8') => 'N', // LATIN CAPITAL LETTER N WITH LONG RIGHT LEG -- no decomposition
        mb_chr(0x0221, 'UTF-8') => 'd', // LATIN SMALL LETTER D WITH CURL -- no decomposition
        mb_chr(0x0222, 'UTF-8') => 'OU', // LATIN CAPITAL LETTER OU -- no decomposition
        mb_chr(0x0223, 'UTF-8') => 'ou', // LATIN SMALL LETTER OU -- no decomposition
        mb_chr(0x0224, 'UTF-8') => 'Z', // LATIN CAPITAL LETTER Z WITH HOOK -- no decomposition
        mb_chr(0x0225, 'UTF-8') => 'z', // LATIN SMALL LETTER Z WITH HOOK -- no decomposition
        mb_chr(0x0226, 'UTF-8') => 'A', // LATIN CAPITAL LETTER A WITH DOT ABOVE
        mb_chr(0x0227, 'UTF-8') => 'a', // LATIN SMALL LETTER A WITH DOT ABOVE
        mb_chr(0x0228, 'UTF-8') => 'E', // LATIN CAPITAL LETTER E WITH CEDILLA
        mb_chr(0x0229, 'UTF-8') => 'e', // LATIN SMALL LETTER E WITH CEDILLA
        mb_chr(0x022A, 'UTF-8') => 'O', // LATIN CAPITAL LETTER O WITH DIAERESIS AND MACRON
        mb_chr(0x022B, 'UTF-8') => 'o', // LATIN SMALL LETTER O WITH DIAERESIS AND MACRON
        mb_chr(0x022C, 'UTF-8') => 'O', // LATIN CAPITAL LETTER O WITH TILDE AND MACRON
        mb_chr(0x022D, 'UTF-8') => 'o', // LATIN SMALL LETTER O WITH TILDE AND MACRON
        mb_chr(0x022E, 'UTF-8') => 'O', // LATIN CAPITAL LETTER O WITH DOT ABOVE
        mb_chr(0x022F, 'UTF-8') => 'o', // LATIN SMALL LETTER O WITH DOT ABOVE
        mb_chr(0x0230, 'UTF-8') => 'O', // LATIN CAPITAL LETTER O WITH DOT ABOVE AND MACRON
        mb_chr(0x0231, 'UTF-8') => 'o', // LATIN SMALL LETTER O WITH DOT ABOVE AND MACRON
        mb_chr(0x0232, 'UTF-8') => 'Y', // LATIN CAPITAL LETTER Y WITH MACRON
        mb_chr(0x0233, 'UTF-8') => 'y', // LATIN SMALL LETTER Y WITH MACRON
        mb_chr(0x0234, 'UTF-8') => 'l', // LATIN SMALL LETTER L WITH CURL -- no decomposition
        mb_chr(0x0235, 'UTF-8') => 'n', // LATIN SMALL LETTER N WITH CURL -- no decomposition
        mb_chr(0x0236, 'UTF-8') => 't', // LATIN SMALL LETTER T WITH CURL -- no decomposition
        mb_chr(0x0250, 'UTF-8') => 'a', // LATIN SMALL LETTER TURNED A -- no decomposition
        mb_chr(0x0251, 'UTF-8') => 'a', // LATIN SMALL LETTER ALPHA -- no decomposition
        mb_chr(0x0252, 'UTF-8') => 'a', // LATIN SMALL LETTER TURNED ALPHA -- no decomposition
        mb_chr(0x0253, 'UTF-8') => 'b', // LATIN SMALL LETTER B WITH HOOK -- no decomposition
        mb_chr(0x0254, 'UTF-8') => 'o', // LATIN SMALL LETTER OPEN O -- no decomposition
        mb_chr(0x0255, 'UTF-8') => 'c', // LATIN SMALL LETTER C WITH CURL -- no decomposition
        mb_chr(0x0256, 'UTF-8') => 'd', // LATIN SMALL LETTER D WITH TAIL -- no decomposition
        mb_chr(0x0257, 'UTF-8') => 'd', // LATIN SMALL LETTER D WITH HOOK -- no decomposition
        mb_chr(0x0258, 'UTF-8') => 'e', // LATIN SMALL LETTER REVERSED E -- no decomposition
        mb_chr(0x0259, 'UTF-8') => 'e', // LATIN SMALL LETTER SCHWA -- no decomposition
        mb_chr(0x025A, 'UTF-8') => 'e', // LATIN SMALL LETTER SCHWA WITH HOOK -- no decomposition
        mb_chr(0x025B, 'UTF-8') => 'e', // LATIN SMALL LETTER OPEN E -- no decomposition
        mb_chr(0x025C, 'UTF-8') => 'e', // LATIN SMALL LETTER REVERSED OPEN E -- no decomposition
        mb_chr(0x025D, 'UTF-8') => 'e', // LATIN SMALL LETTER REVERSED OPEN E WITH HOOK -- no decomposition
        mb_chr(0x025E, 'UTF-8') => 'e', // LATIN SMALL LETTER CLOSED REVERSED OPEN E -- no decomposition
        mb_chr(0x025F, 'UTF-8') => 'j', // LATIN SMALL LETTER DOTLESS J WITH STROKE -- no decomposition
        mb_chr(0x0260, 'UTF-8') => 'g', // LATIN SMALL LETTER G WITH HOOK -- no decomposition
        mb_chr(0x0261, 'UTF-8') => 'g', // LATIN SMALL LETTER SCRIPT G -- no decomposition
        mb_chr(0x0262, 'UTF-8') => 'G', // LATIN LETTER SMALL CAPITAL G -- no decomposition
        mb_chr(0x0263, 'UTF-8') => 'g', // LATIN SMALL LETTER GAMMA -- no decomposition
        mb_chr(0x0264, 'UTF-8') => 'y', // LATIN SMALL LETTER RAMS HORN -- no decomposition
        mb_chr(0x0265, 'UTF-8') => 'h', // LATIN SMALL LETTER TURNED H -- no decomposition
        mb_chr(0x0266, 'UTF-8') => 'h', // LATIN SMALL LETTER H WITH HOOK -- no decomposition
        mb_chr(0x0267, 'UTF-8') => 'h', // LATIN SMALL LETTER HENG WITH HOOK -- no decomposition
        mb_chr(0x0268, 'UTF-8') => 'i', // LATIN SMALL LETTER I WITH STROKE -- no decomposition
        mb_chr(0x0269, 'UTF-8') => 'i', // LATIN SMALL LETTER IOTA -- no decomposition
        mb_chr(0x026A, 'UTF-8') => 'I', // LATIN LETTER SMALL CAPITAL I -- no decomposition
        mb_chr(0x026B, 'UTF-8') => 'l', // LATIN SMALL LETTER L WITH MIDDLE TILDE -- no decomposition
        mb_chr(0x026C, 'UTF-8') => 'l', // LATIN SMALL LETTER L WITH BELT -- no decomposition
        mb_chr(0x026D, 'UTF-8') => 'l', // LATIN SMALL LETTER L WITH RETROFLEX HOOK -- no decomposition
        mb_chr(0x026E, 'UTF-8') => 'lz', // LATIN SMALL LETTER LEZH -- no decomposition
        mb_chr(0x026F, 'UTF-8') => 'm', // LATIN SMALL LETTER TURNED M -- no decomposition
        mb_chr(0x0270, 'UTF-8') => 'm', // LATIN SMALL LETTER TURNED M WITH LONG LEG -- no decomposition
        mb_chr(0x0271, 'UTF-8') => 'm', // LATIN SMALL LETTER M WITH HOOK -- no decomposition
        mb_chr(0x0272, 'UTF-8') => 'n', // LATIN SMALL LETTER N WITH LEFT HOOK -- no decomposition
        mb_chr(0x0273, 'UTF-8') => 'n', // LATIN SMALL LETTER N WITH RETROFLEX HOOK -- no decomposition
        mb_chr(0x0274, 'UTF-8') => 'N', // LATIN LETTER SMALL CAPITAL N -- no decomposition
        mb_chr(0x0275, 'UTF-8') => 'o', // LATIN SMALL LETTER BARRED O -- no decomposition
        mb_chr(0x0276, 'UTF-8') => 'OE', // LATIN LETTER SMALL CAPITAL OE -- no decomposition
        mb_chr(0x0277, 'UTF-8') => 'o', // LATIN SMALL LETTER CLOSED OMEGA -- no decomposition
        mb_chr(0x0278, 'UTF-8') => 'ph', // LATIN SMALL LETTER PHI -- no decomposition
        mb_chr(0x0279, 'UTF-8') => 'r', // LATIN SMALL LETTER TURNED R -- no decomposition
        mb_chr(0x027A, 'UTF-8') => 'r', // LATIN SMALL LETTER TURNED R WITH LONG LEG -- no decomposition
        mb_chr(0x027B, 'UTF-8') => 'r', // LATIN SMALL LETTER TURNED R WITH HOOK -- no decomposition
        mb_chr(0x027C, 'UTF-8') => 'r', // LATIN SMALL LETTER R WITH LONG LEG -- no decomposition
        mb_chr(0x027D, 'UTF-8') => 'r', // LATIN SMALL LETTER R WITH TAIL -- no decomposition
        mb_chr(0x027E, 'UTF-8') => 'r', // LATIN SMALL LETTER R WITH FISHHOOK -- no decomposition
        mb_chr(0x027F, 'UTF-8') => 'r', // LATIN SMALL LETTER REVERSED R WITH FISHHOOK -- no decomposition
        mb_chr(0x0280, 'UTF-8') => 'R', // LATIN LETTER SMALL CAPITAL R -- no decomposition
        mb_chr(0x0281, 'UTF-8') => 'r', // LATIN LETTER SMALL CAPITAL INVERTED R -- no decomposition
        mb_chr(0x0282, 'UTF-8') => 's', // LATIN SMALL LETTER S WITH HOOK -- no decomposition
        mb_chr(0x0283, 'UTF-8') => 's', // LATIN SMALL LETTER ESH -- no decomposition
        mb_chr(0x0284, 'UTF-8') => 'j', // LATIN SMALL LETTER DOTLESS J WITH STROKE AND HOOK -- no decomposition
        mb_chr(0x0285, 'UTF-8') => 's', // LATIN SMALL LETTER SQUAT REVERSED ESH -- no decomposition
        mb_chr(0x0286, 'UTF-8') => 's', // LATIN SMALL LETTER ESH WITH CURL -- no decomposition
        mb_chr(0x0287, 'UTF-8') => 'y', // LATIN SMALL LETTER TURNED T -- no decomposition
        mb_chr(0x0288, 'UTF-8') => 't', // LATIN SMALL LETTER T WITH RETROFLEX HOOK -- no decomposition
        mb_chr(0x0289, 'UTF-8') => 'u', // LATIN SMALL LETTER U BAR -- no decomposition
        mb_chr(0x028A, 'UTF-8') => 'u', // LATIN SMALL LETTER UPSILON -- no decomposition
        mb_chr(0x028B, 'UTF-8') => 'u', // LATIN SMALL LETTER V WITH HOOK -- no decomposition
        mb_chr(0x028C, 'UTF-8') => 'v', // LATIN SMALL LETTER TURNED V -- no decomposition
        mb_chr(0x028D, 'UTF-8') => 'w', // LATIN SMALL LETTER TURNED W -- no decomposition
        mb_chr(0x028E, 'UTF-8') => 'y', // LATIN SMALL LETTER TURNED Y -- no decomposition
        mb_chr(0x028F, 'UTF-8') => 'Y', // LATIN LETTER SMALL CAPITAL Y -- no decomposition
        mb_chr(0x0290, 'UTF-8') => 'z', // LATIN SMALL LETTER Z WITH RETROFLEX HOOK -- no decomposition
        mb_chr(0x0291, 'UTF-8') => 'z', // LATIN SMALL LETTER Z WITH CURL -- no decomposition
        mb_chr(0x0292, 'UTF-8') => 'z', // LATIN SMALL LETTER EZH -- no decomposition
        mb_chr(0x0293, 'UTF-8') => 'z', // LATIN SMALL LETTER EZH WITH CURL -- no decomposition
        mb_chr(0x0294, 'UTF-8') => '\'', // LATIN LETTER GLOTTAL STOP -- no decomposition
        mb_chr(0x0295, 'UTF-8') => '\'', // LATIN LETTER PHARYNGEAL VOICED FRICATIVE -- no decomposition
        mb_chr(0x0296, 'UTF-8') => '\'', // LATIN LETTER INVERTED GLOTTAL STOP -- no decomposition
        mb_chr(0x0297, 'UTF-8') => 'C', // LATIN LETTER STRETCHED C -- no decomposition
        // mb_chr(0x0298, 'UTF-8') => 'O˜', // LATIN LETTER BILABIAL CLICK -- no decomposition
        mb_chr(0x0299, 'UTF-8') => 'B', // LATIN LETTER SMALL CAPITAL B -- no decomposition
        mb_chr(0x029A, 'UTF-8') => 'e', // LATIN SMALL LETTER CLOSED OPEN E -- no decomposition
        mb_chr(0x029B, 'UTF-8') => 'G', // LATIN LETTER SMALL CAPITAL G WITH HOOK -- no decomposition
        mb_chr(0x029C, 'UTF-8') => 'H', // LATIN LETTER SMALL CAPITAL H -- no decomposition
        mb_chr(0x029D, 'UTF-8') => 'j', // LATIN SMALL LETTER J WITH CROSSED-TAIL -- no decomposition
        mb_chr(0x029E, 'UTF-8') => 'k', // LATIN SMALL LETTER TURNED K -- no decomposition
        mb_chr(0x029F, 'UTF-8') => 'L', // LATIN LETTER SMALL CAPITAL L -- no decomposition
        mb_chr(0x02A0, 'UTF-8') => 'q', // LATIN SMALL LETTER Q WITH HOOK -- no decomposition
        mb_chr(0x02A1, 'UTF-8') => '\'', // LATIN LETTER GLOTTAL STOP WITH STROKE -- no decomposition
        mb_chr(0x02A2, 'UTF-8') => '\'', // LATIN LETTER REVERSED GLOTTAL STOP WITH STROKE -- no decomposition
        mb_chr(0x02A3, 'UTF-8') => 'dz', // LATIN SMALL LETTER DZ DIGRAPH -- no decomposition
        mb_chr(0x02A4, 'UTF-8') => 'dz', // LATIN SMALL LETTER DEZH DIGRAPH -- no decomposition
        mb_chr(0x02A5, 'UTF-8') => 'dz', // LATIN SMALL LETTER DZ DIGRAPH WITH CURL -- no decomposition
        mb_chr(0x02A6, 'UTF-8') => 'ts', // LATIN SMALL LETTER TS DIGRAPH -- no decomposition
        mb_chr(0x02A7, 'UTF-8') => 'ts', // LATIN SMALL LETTER TESH DIGRAPH -- no decomposition
        mb_chr(0x02A8, 'UTF-8') => '', // LATIN SMALL LETTER TC DIGRAPH WITH CURL -- no decomposition
        mb_chr(0x02A9, 'UTF-8') => 'fn', // LATIN SMALL LETTER FENG DIGRAPH -- no decomposition
        mb_chr(0x02AA, 'UTF-8') => 'ls', // LATIN SMALL LETTER LS DIGRAPH -- no decomposition
        mb_chr(0x02AB, 'UTF-8') => 'lz', // LATIN SMALL LETTER LZ DIGRAPH -- no decomposition
        mb_chr(0x02AC, 'UTF-8') => 'w', // LATIN LETTER BILABIAL PERCUSSIVE -- no decomposition
        mb_chr(0x02AD, 'UTF-8') => 't', // LATIN LETTER BIDENTAL PERCUSSIVE -- no decomposition
        mb_chr(0x02AE, 'UTF-8') => 'h', // LATIN SMALL LETTER TURNED H WITH FISHHOOK -- no decomposition
        mb_chr(0x02AF, 'UTF-8') => 'h', // LATIN SMALL LETTER TURNED H WITH FISHHOOK AND TAIL -- no decomposition
        mb_chr(0x02B0, 'UTF-8') => 'h', // MODIFIER LETTER SMALL H
        mb_chr(0x02B1, 'UTF-8') => 'h', // MODIFIER LETTER SMALL H WITH HOOK
        mb_chr(0x02B2, 'UTF-8') => 'j', // MODIFIER LETTER SMALL J
        mb_chr(0x02B3, 'UTF-8') => 'r', // MODIFIER LETTER SMALL R
        mb_chr(0x02B4, 'UTF-8') => 'r', // MODIFIER LETTER SMALL TURNED R
        mb_chr(0x02B5, 'UTF-8') => 'r', // MODIFIER LETTER SMALL TURNED R WITH HOOK
        mb_chr(0x02B6, 'UTF-8') => 'R', // MODIFIER LETTER SMALL CAPITAL INVERTED R
        mb_chr(0x02B7, 'UTF-8') => 'w', // MODIFIER LETTER SMALL W
        mb_chr(0x02B8, 'UTF-8') => 'y', // MODIFIER LETTER SMALL Y
        mb_chr(0x02E1, 'UTF-8') => 'l', // MODIFIER LETTER SMALL L
        mb_chr(0x02E2, 'UTF-8') => 's', // MODIFIER LETTER SMALL S
        mb_chr(0x02E3, 'UTF-8') => 'x', // MODIFIER LETTER SMALL X
        mb_chr(0x02E4, 'UTF-8') => '\'', // MODIFIER LETTER SMALL REVERSED GLOTTAL STOP
        mb_chr(0x1D00, 'UTF-8') => 'A', // LATIN LETTER SMALL CAPITAL A -- no decomposition
        mb_chr(0x1D01, 'UTF-8') => 'AE', // LATIN LETTER SMALL CAPITAL AE -- no decomposition
        mb_chr(0x1D02, 'UTF-8') => 'ae', // LATIN SMALL LETTER TURNED AE -- no decomposition
        mb_chr(0x1D03, 'UTF-8') => 'B', // LATIN LETTER SMALL CAPITAL BARRED B -- no decomposition
        mb_chr(0x1D04, 'UTF-8') => 'C', // LATIN LETTER SMALL CAPITAL C -- no decomposition
        mb_chr(0x1D05, 'UTF-8') => 'D', // LATIN LETTER SMALL CAPITAL D -- no decomposition
        mb_chr(0x1D06, 'UTF-8') => 'TH', // LATIN LETTER SMALL CAPITAL ETH -- no decomposition
        mb_chr(0x1D07, 'UTF-8') => 'E', // LATIN LETTER SMALL CAPITAL E -- no decomposition
        mb_chr(0x1D08, 'UTF-8') => 'e', // LATIN SMALL LETTER TURNED OPEN E -- no decomposition
        mb_chr(0x1D09, 'UTF-8') => 'i', // LATIN SMALL LETTER TURNED I -- no decomposition
        mb_chr(0x1D0A, 'UTF-8') => 'J', // LATIN LETTER SMALL CAPITAL J -- no decomposition
        mb_chr(0x1D0B, 'UTF-8') => 'K', // LATIN LETTER SMALL CAPITAL K -- no decomposition
        mb_chr(0x1D0C, 'UTF-8') => 'L', // LATIN LETTER SMALL CAPITAL L WITH STROKE -- no decomposition
        mb_chr(0x1D0D, 'UTF-8') => 'M', // LATIN LETTER SMALL CAPITAL M -- no decomposition
        mb_chr(0x1D0E, 'UTF-8') => 'N', // LATIN LETTER SMALL CAPITAL REVERSED N -- no decomposition
        mb_chr(0x1D0F, 'UTF-8') => 'O', // LATIN LETTER SMALL CAPITAL O -- no decomposition
        mb_chr(0x1D10, 'UTF-8') => 'O', // LATIN LETTER SMALL CAPITAL OPEN O -- no decomposition
        mb_chr(0x1D11, 'UTF-8') => 'o', // LATIN SMALL LETTER SIDEWAYS O -- no decomposition
        mb_chr(0x1D12, 'UTF-8') => 'o', // LATIN SMALL LETTER SIDEWAYS OPEN O -- no decomposition
        mb_chr(0x1D13, 'UTF-8') => 'o', // LATIN SMALL LETTER SIDEWAYS O WITH STROKE -- no decomposition
        mb_chr(0x1D14, 'UTF-8') => 'oe', // LATIN SMALL LETTER TURNED OE -- no decomposition
        mb_chr(0x1D15, 'UTF-8') => 'ou', // LATIN LETTER SMALL CAPITAL OU -- no decomposition
        mb_chr(0x1D16, 'UTF-8') => 'o', // LATIN SMALL LETTER TOP HALF O -- no decomposition
        mb_chr(0x1D17, 'UTF-8') => 'o', // LATIN SMALL LETTER BOTTOM HALF O -- no decomposition
        mb_chr(0x1D18, 'UTF-8') => 'P', // LATIN LETTER SMALL CAPITAL P -- no decomposition
        mb_chr(0x1D19, 'UTF-8') => 'R', // LATIN LETTER SMALL CAPITAL REVERSED R -- no decomposition
        mb_chr(0x1D1A, 'UTF-8') => 'R', // LATIN LETTER SMALL CAPITAL TURNED R -- no decomposition
        mb_chr(0x1D1B, 'UTF-8') => 'T', // LATIN LETTER SMALL CAPITAL T -- no decomposition
        mb_chr(0x1D1C, 'UTF-8') => 'U', // LATIN LETTER SMALL CAPITAL U -- no decomposition
        mb_chr(0x1D1D, 'UTF-8') => 'u', // LATIN SMALL LETTER SIDEWAYS U -- no decomposition
        mb_chr(0x1D1E, 'UTF-8') => 'u', // LATIN SMALL LETTER SIDEWAYS DIAERESIZED U -- no decomposition
        mb_chr(0x1D1F, 'UTF-8') => 'm', // LATIN SMALL LETTER SIDEWAYS TURNED M -- no decomposition
        mb_chr(0x1D20, 'UTF-8') => 'V', // LATIN LETTER SMALL CAPITAL V -- no decomposition
        mb_chr(0x1D21, 'UTF-8') => 'W', // LATIN LETTER SMALL CAPITAL W -- no decomposition
        mb_chr(0x1D22, 'UTF-8') => 'Z', // LATIN LETTER SMALL CAPITAL Z -- no decomposition
        mb_chr(0x1D23, 'UTF-8') => 'EZH', // LATIN LETTER SMALL CAPITAL EZH -- no decomposition
        mb_chr(0x1D24, 'UTF-8') => '\'', // LATIN LETTER VOICED LARYNGEAL SPIRANT -- no decomposition
        mb_chr(0x1D25, 'UTF-8') => 'L', // LATIN LETTER AIN -- no decomposition
        mb_chr(0x1D2C, 'UTF-8') => 'A', // MODIFIER LETTER CAPITAL A
        mb_chr(0x1D2D, 'UTF-8') => 'AE', // MODIFIER LETTER CAPITAL AE
        mb_chr(0x1D2E, 'UTF-8') => 'B', // MODIFIER LETTER CAPITAL B
        mb_chr(0x1D2F, 'UTF-8') => 'B', // MODIFIER LETTER CAPITAL BARRED B -- no decomposition
        mb_chr(0x1D30, 'UTF-8') => 'D', // MODIFIER LETTER CAPITAL D
        mb_chr(0x1D31, 'UTF-8') => 'E', // MODIFIER LETTER CAPITAL E
        mb_chr(0x1D32, 'UTF-8') => 'E', // MODIFIER LETTER CAPITAL REVERSED E
        mb_chr(0x1D33, 'UTF-8') => 'G', // MODIFIER LETTER CAPITAL G
        mb_chr(0x1D34, 'UTF-8') => 'H', // MODIFIER LETTER CAPITAL H
        mb_chr(0x1D35, 'UTF-8') => 'I', // MODIFIER LETTER CAPITAL I
        mb_chr(0x1D36, 'UTF-8') => 'J', // MODIFIER LETTER CAPITAL J
        mb_chr(0x1D37, 'UTF-8') => 'K', // MODIFIER LETTER CAPITAL K
        mb_chr(0x1D38, 'UTF-8') => 'L', // MODIFIER LETTER CAPITAL L
        mb_chr(0x1D39, 'UTF-8') => 'M', // MODIFIER LETTER CAPITAL M
        mb_chr(0x1D3A, 'UTF-8') => 'N', // MODIFIER LETTER CAPITAL N
        mb_chr(0x1D3B, 'UTF-8') => 'N', // MODIFIER LETTER CAPITAL REVERSED N -- no decomposition
        mb_chr(0x1D3C, 'UTF-8') => 'O', // MODIFIER LETTER CAPITAL O
        mb_chr(0x1D3D, 'UTF-8') => 'OU', // MODIFIER LETTER CAPITAL OU
        mb_chr(0x1D3E, 'UTF-8') => 'P', // MODIFIER LETTER CAPITAL P
        mb_chr(0x1D3F, 'UTF-8') => 'R', // MODIFIER LETTER CAPITAL R
        mb_chr(0x1D40, 'UTF-8') => 'T', // MODIFIER LETTER CAPITAL T
        mb_chr(0x1D41, 'UTF-8') => 'U', // MODIFIER LETTER CAPITAL U
        mb_chr(0x1D42, 'UTF-8') => 'W', // MODIFIER LETTER CAPITAL W
        mb_chr(0x1D43, 'UTF-8') => 'a', // MODIFIER LETTER SMALL A
        mb_chr(0x1D44, 'UTF-8') => 'a', // MODIFIER LETTER SMALL TURNED A
        mb_chr(0x1D46, 'UTF-8') => 'ae', // MODIFIER LETTER SMALL TURNED AE
        mb_chr(0x1D47, 'UTF-8') => 'b', // MODIFIER LETTER SMALL B
        mb_chr(0x1D48, 'UTF-8') => 'd', // MODIFIER LETTER SMALL D
        mb_chr(0x1D49, 'UTF-8') => 'e', // MODIFIER LETTER SMALL E
        mb_chr(0x1D4A, 'UTF-8') => 'e', // MODIFIER LETTER SMALL SCHWA
        mb_chr(0x1D4B, 'UTF-8') => 'e', // MODIFIER LETTER SMALL OPEN E
        mb_chr(0x1D4C, 'UTF-8') => 'e', // MODIFIER LETTER SMALL TURNED OPEN E
        mb_chr(0x1D4D, 'UTF-8') => 'g', // MODIFIER LETTER SMALL G
        mb_chr(0x1D4E, 'UTF-8') => 'i', // MODIFIER LETTER SMALL TURNED I -- no decomposition
        mb_chr(0x1D4F, 'UTF-8') => 'k', // MODIFIER LETTER SMALL K
        mb_chr(0x1D50, 'UTF-8') => 'm', // MODIFIER LETTER SMALL M
        mb_chr(0x1D51, 'UTF-8') => 'g', // MODIFIER LETTER SMALL ENG
        mb_chr(0x1D52, 'UTF-8') => 'o', // MODIFIER LETTER SMALL O
        mb_chr(0x1D53, 'UTF-8') => 'o', // MODIFIER LETTER SMALL OPEN O
        mb_chr(0x1D54, 'UTF-8') => 'o', // MODIFIER LETTER SMALL TOP HALF O
        mb_chr(0x1D55, 'UTF-8') => 'o', // MODIFIER LETTER SMALL BOTTOM HALF O
        mb_chr(0x1D56, 'UTF-8') => 'p', // MODIFIER LETTER SMALL P
        mb_chr(0x1D57, 'UTF-8') => 't', // MODIFIER LETTER SMALL T
        mb_chr(0x1D58, 'UTF-8') => 'u', // MODIFIER LETTER SMALL U
        mb_chr(0x1D59, 'UTF-8') => 'u', // MODIFIER LETTER SMALL SIDEWAYS U
        mb_chr(0x1D5A, 'UTF-8') => 'm', // MODIFIER LETTER SMALL TURNED M
        mb_chr(0x1D5B, 'UTF-8') => 'v', // MODIFIER LETTER SMALL V
        mb_chr(0x1D62, 'UTF-8') => 'i', // LATIN SUBSCRIPT SMALL LETTER I
        mb_chr(0x1D63, 'UTF-8') => 'r', // LATIN SUBSCRIPT SMALL LETTER R
        mb_chr(0x1D64, 'UTF-8') => 'u', // LATIN SUBSCRIPT SMALL LETTER U
        mb_chr(0x1D65, 'UTF-8') => 'v', // LATIN SUBSCRIPT SMALL LETTER V
        mb_chr(0x1D6B, 'UTF-8') => 'ue', // LATIN SMALL LETTER UE -- no decomposition
        mb_chr(0x1E00, 'UTF-8') => 'A', // LATIN CAPITAL LETTER A WITH RING BELOW
        mb_chr(0x1E01, 'UTF-8') => 'a', // LATIN SMALL LETTER A WITH RING BELOW
        mb_chr(0x1E02, 'UTF-8') => 'B', // LATIN CAPITAL LETTER B WITH DOT ABOVE
        mb_chr(0x1E03, 'UTF-8') => 'b', // LATIN SMALL LETTER B WITH DOT ABOVE
        mb_chr(0x1E04, 'UTF-8') => 'B', // LATIN CAPITAL LETTER B WITH DOT BELOW
        mb_chr(0x1E05, 'UTF-8') => 'b', // LATIN SMALL LETTER B WITH DOT BELOW
        mb_chr(0x1E06, 'UTF-8') => 'B', // LATIN CAPITAL LETTER B WITH LINE BELOW
        mb_chr(0x1E07, 'UTF-8') => 'b', // LATIN SMALL LETTER B WITH LINE BELOW
        mb_chr(0x1E08, 'UTF-8') => 'C', // LATIN CAPITAL LETTER C WITH CEDILLA AND ACUTE
        mb_chr(0x1E09, 'UTF-8') => 'c', // LATIN SMALL LETTER C WITH CEDILLA AND ACUTE
        mb_chr(0x1E0A, 'UTF-8') => 'D', // LATIN CAPITAL LETTER D WITH DOT ABOVE
        mb_chr(0x1E0B, 'UTF-8') => 'd', // LATIN SMALL LETTER D WITH DOT ABOVE
        mb_chr(0x1E0C, 'UTF-8') => 'D', // LATIN CAPITAL LETTER D WITH DOT BELOW
        mb_chr(0x1E0D, 'UTF-8') => 'd', // LATIN SMALL LETTER D WITH DOT BELOW
        mb_chr(0x1E0E, 'UTF-8') => 'D', // LATIN CAPITAL LETTER D WITH LINE BELOW
        mb_chr(0x1E0F, 'UTF-8') => 'd', // LATIN SMALL LETTER D WITH LINE BELOW
        mb_chr(0x1E10, 'UTF-8') => 'D', // LATIN CAPITAL LETTER D WITH CEDILLA
        mb_chr(0x1E11, 'UTF-8') => 'd', // LATIN SMALL LETTER D WITH CEDILLA
        mb_chr(0x1E12, 'UTF-8') => 'D', // LATIN CAPITAL LETTER D WITH CIRCUMFLEX BELOW
        mb_chr(0x1E13, 'UTF-8') => 'd', // LATIN SMALL LETTER D WITH CIRCUMFLEX BELOW
        mb_chr(0x1E14, 'UTF-8') => 'E', // LATIN CAPITAL LETTER E WITH MACRON AND GRAVE
        mb_chr(0x1E15, 'UTF-8') => 'e', // LATIN SMALL LETTER E WITH MACRON AND GRAVE
        mb_chr(0x1E16, 'UTF-8') => 'E', // LATIN CAPITAL LETTER E WITH MACRON AND ACUTE
        mb_chr(0x1E17, 'UTF-8') => 'e', // LATIN SMALL LETTER E WITH MACRON AND ACUTE
        mb_chr(0x1E18, 'UTF-8') => 'E', // LATIN CAPITAL LETTER E WITH CIRCUMFLEX BELOW
        mb_chr(0x1E19, 'UTF-8') => 'e', // LATIN SMALL LETTER E WITH CIRCUMFLEX BELOW
        mb_chr(0x1E1A, 'UTF-8') => 'E', // LATIN CAPITAL LETTER E WITH TILDE BELOW
        mb_chr(0x1E1B, 'UTF-8') => 'e', // LATIN SMALL LETTER E WITH TILDE BELOW
        mb_chr(0x1E1C, 'UTF-8') => 'E', // LATIN CAPITAL LETTER E WITH CEDILLA AND BREVE
        mb_chr(0x1E1D, 'UTF-8') => 'e', // LATIN SMALL LETTER E WITH CEDILLA AND BREVE
        mb_chr(0x1E1E, 'UTF-8') => 'F', // LATIN CAPITAL LETTER F WITH DOT ABOVE
        mb_chr(0x1E1F, 'UTF-8') => 'f', // LATIN SMALL LETTER F WITH DOT ABOVE
        mb_chr(0x1E20, 'UTF-8') => 'G', // LATIN CAPITAL LETTER G WITH MACRON
        mb_chr(0x1E21, 'UTF-8') => 'g', // LATIN SMALL LETTER G WITH MACRON
        mb_chr(0x1E22, 'UTF-8') => 'H', // LATIN CAPITAL LETTER H WITH DOT ABOVE
        mb_chr(0x1E23, 'UTF-8') => 'h', // LATIN SMALL LETTER H WITH DOT ABOVE
        mb_chr(0x1E24, 'UTF-8') => 'H', // LATIN CAPITAL LETTER H WITH DOT BELOW
        mb_chr(0x1E25, 'UTF-8') => 'h', // LATIN SMALL LETTER H WITH DOT BELOW
        mb_chr(0x1E26, 'UTF-8') => 'H', // LATIN CAPITAL LETTER H WITH DIAERESIS
        mb_chr(0x1E27, 'UTF-8') => 'h', // LATIN SMALL LETTER H WITH DIAERESIS
        mb_chr(0x1E28, 'UTF-8') => 'H', // LATIN CAPITAL LETTER H WITH CEDILLA
        mb_chr(0x1E29, 'UTF-8') => 'h', // LATIN SMALL LETTER H WITH CEDILLA
        mb_chr(0x1E2A, 'UTF-8') => 'H', // LATIN CAPITAL LETTER H WITH BREVE BELOW
        mb_chr(0x1E2B, 'UTF-8') => 'h', // LATIN SMALL LETTER H WITH BREVE BELOW
        mb_chr(0x1E2C, 'UTF-8') => 'I', // LATIN CAPITAL LETTER I WITH TILDE BELOW
        mb_chr(0x1E2D, 'UTF-8') => 'i', // LATIN SMALL LETTER I WITH TILDE BELOW
        mb_chr(0x1E2E, 'UTF-8') => 'I', // LATIN CAPITAL LETTER I WITH DIAERESIS AND ACUTE
        mb_chr(0x1E2F, 'UTF-8') => 'i', // LATIN SMALL LETTER I WITH DIAERESIS AND ACUTE
        mb_chr(0x1E30, 'UTF-8') => 'K', // LATIN CAPITAL LETTER K WITH ACUTE
        mb_chr(0x1E31, 'UTF-8') => 'k', // LATIN SMALL LETTER K WITH ACUTE
        mb_chr(0x1E32, 'UTF-8') => 'K', // LATIN CAPITAL LETTER K WITH DOT BELOW
        mb_chr(0x1E33, 'UTF-8') => 'k', // LATIN SMALL LETTER K WITH DOT BELOW
        mb_chr(0x1E34, 'UTF-8') => 'K', // LATIN CAPITAL LETTER K WITH LINE BELOW
        mb_chr(0x1E35, 'UTF-8') => 'k', // LATIN SMALL LETTER K WITH LINE BELOW
        mb_chr(0x1E36, 'UTF-8') => 'L', // LATIN CAPITAL LETTER L WITH DOT BELOW
        mb_chr(0x1E37, 'UTF-8') => 'l', // LATIN SMALL LETTER L WITH DOT BELOW
        mb_chr(0x1E38, 'UTF-8') => 'L', // LATIN CAPITAL LETTER L WITH DOT BELOW AND MACRON
        mb_chr(0x1E39, 'UTF-8') => 'l', // LATIN SMALL LETTER L WITH DOT BELOW AND MACRON
        mb_chr(0x1E3A, 'UTF-8') => 'L', // LATIN CAPITAL LETTER L WITH LINE BELOW
        mb_chr(0x1E3B, 'UTF-8') => 'l', // LATIN SMALL LETTER L WITH LINE BELOW
        mb_chr(0x1E3C, 'UTF-8') => 'L', // LATIN CAPITAL LETTER L WITH CIRCUMFLEX BELOW
        mb_chr(0x1E3D, 'UTF-8') => 'l', // LATIN SMALL LETTER L WITH CIRCUMFLEX BELOW
        mb_chr(0x1E3E, 'UTF-8') => 'M', // LATIN CAPITAL LETTER M WITH ACUTE
        mb_chr(0x1E3F, 'UTF-8') => 'm', // LATIN SMALL LETTER M WITH ACUTE
        mb_chr(0x1E40, 'UTF-8') => 'M', // LATIN CAPITAL LETTER M WITH DOT ABOVE
        mb_chr(0x1E41, 'UTF-8') => 'm', // LATIN SMALL LETTER M WITH DOT ABOVE
        mb_chr(0x1E42, 'UTF-8') => 'M', // LATIN CAPITAL LETTER M WITH DOT BELOW
        mb_chr(0x1E43, 'UTF-8') => 'm', // LATIN SMALL LETTER M WITH DOT BELOW
        mb_chr(0x1E44, 'UTF-8') => 'N', // LATIN CAPITAL LETTER N WITH DOT ABOVE
        mb_chr(0x1E45, 'UTF-8') => 'n', // LATIN SMALL LETTER N WITH DOT ABOVE
        mb_chr(0x1E46, 'UTF-8') => 'N', // LATIN CAPITAL LETTER N WITH DOT BELOW
        mb_chr(0x1E47, 'UTF-8') => 'n', // LATIN SMALL LETTER N WITH DOT BELOW
        mb_chr(0x1E48, 'UTF-8') => 'N', // LATIN CAPITAL LETTER N WITH LINE BELOW
        mb_chr(0x1E49, 'UTF-8') => 'n', // LATIN SMALL LETTER N WITH LINE BELOW
        mb_chr(0x1E4A, 'UTF-8') => 'N', // LATIN CAPITAL LETTER N WITH CIRCUMFLEX BELOW
        mb_chr(0x1E4B, 'UTF-8') => 'n', // LATIN SMALL LETTER N WITH CIRCUMFLEX BELOW
        mb_chr(0x1E4C, 'UTF-8') => 'O', // LATIN CAPITAL LETTER O WITH TILDE AND ACUTE
        mb_chr(0x1E4D, 'UTF-8') => 'o', // LATIN SMALL LETTER O WITH TILDE AND ACUTE
        mb_chr(0x1E4E, 'UTF-8') => 'O', // LATIN CAPITAL LETTER O WITH TILDE AND DIAERESIS
        mb_chr(0x1E4F, 'UTF-8') => 'o', // LATIN SMALL LETTER O WITH TILDE AND DIAERESIS
        mb_chr(0x1E50, 'UTF-8') => 'O', // LATIN CAPITAL LETTER O WITH MACRON AND GRAVE
        mb_chr(0x1E51, 'UTF-8') => 'o', // LATIN SMALL LETTER O WITH MACRON AND GRAVE
        mb_chr(0x1E52, 'UTF-8') => 'O', // LATIN CAPITAL LETTER O WITH MACRON AND ACUTE
        mb_chr(0x1E53, 'UTF-8') => 'o', // LATIN SMALL LETTER O WITH MACRON AND ACUTE
        mb_chr(0x1E54, 'UTF-8') => 'P', // LATIN CAPITAL LETTER P WITH ACUTE
        mb_chr(0x1E55, 'UTF-8') => 'p', // LATIN SMALL LETTER P WITH ACUTE
        mb_chr(0x1E56, 'UTF-8') => 'P', // LATIN CAPITAL LETTER P WITH DOT ABOVE
        mb_chr(0x1E57, 'UTF-8') => 'p', // LATIN SMALL LETTER P WITH DOT ABOVE
        mb_chr(0x1E58, 'UTF-8') => 'R', // LATIN CAPITAL LETTER R WITH DOT ABOVE
        mb_chr(0x1E59, 'UTF-8') => 'r', // LATIN SMALL LETTER R WITH DOT ABOVE
        mb_chr(0x1E5A, 'UTF-8') => 'R', // LATIN CAPITAL LETTER R WITH DOT BELOW
        mb_chr(0x1E5B, 'UTF-8') => 'r', // LATIN SMALL LETTER R WITH DOT BELOW
        mb_chr(0x1E5C, 'UTF-8') => 'R', // LATIN CAPITAL LETTER R WITH DOT BELOW AND MACRON
        mb_chr(0x1E5D, 'UTF-8') => 'r', // LATIN SMALL LETTER R WITH DOT BELOW AND MACRON
        mb_chr(0x1E5E, 'UTF-8') => 'R', // LATIN CAPITAL LETTER R WITH LINE BELOW
        mb_chr(0x1E5F, 'UTF-8') => 'r', // LATIN SMALL LETTER R WITH LINE BELOW
        mb_chr(0x1E60, 'UTF-8') => 'S', // LATIN CAPITAL LETTER S WITH DOT ABOVE
        mb_chr(0x1E61, 'UTF-8') => 's', // LATIN SMALL LETTER S WITH DOT ABOVE
        mb_chr(0x1E62, 'UTF-8') => 'S', // LATIN CAPITAL LETTER S WITH DOT BELOW
        mb_chr(0x1E63, 'UTF-8') => 's', // LATIN SMALL LETTER S WITH DOT BELOW
        mb_chr(0x1E64, 'UTF-8') => 'S', // LATIN CAPITAL LETTER S WITH ACUTE AND DOT ABOVE
        mb_chr(0x1E65, 'UTF-8') => 's', // LATIN SMALL LETTER S WITH ACUTE AND DOT ABOVE
        mb_chr(0x1E66, 'UTF-8') => 'S', // LATIN CAPITAL LETTER S WITH CARON AND DOT ABOVE
        mb_chr(0x1E67, 'UTF-8') => 's', // LATIN SMALL LETTER S WITH CARON AND DOT ABOVE
        mb_chr(0x1E68, 'UTF-8') => 'S', // LATIN CAPITAL LETTER S WITH DOT BELOW AND DOT ABOVE
        mb_chr(0x1E69, 'UTF-8') => 's', // LATIN SMALL LETTER S WITH DOT BELOW AND DOT ABOVE
        mb_chr(0x1E6A, 'UTF-8') => 'T', // LATIN CAPITAL LETTER T WITH DOT ABOVE
        mb_chr(0x1E6B, 'UTF-8') => 't', // LATIN SMALL LETTER T WITH DOT ABOVE
        mb_chr(0x1E6C, 'UTF-8') => 'T', // LATIN CAPITAL LETTER T WITH DOT BELOW
        mb_chr(0x1E6D, 'UTF-8') => 't', // LATIN SMALL LETTER T WITH DOT BELOW
        mb_chr(0x1E6E, 'UTF-8') => 'T', // LATIN CAPITAL LETTER T WITH LINE BELOW
        mb_chr(0x1E6F, 'UTF-8') => 't', // LATIN SMALL LETTER T WITH LINE BELOW
        mb_chr(0x1E70, 'UTF-8') => 'T', // LATIN CAPITAL LETTER T WITH CIRCUMFLEX BELOW
        mb_chr(0x1E71, 'UTF-8') => 't', // LATIN SMALL LETTER T WITH CIRCUMFLEX BELOW
        mb_chr(0x1E72, 'UTF-8') => 'U', // LATIN CAPITAL LETTER U WITH DIAERESIS BELOW
        mb_chr(0x1E73, 'UTF-8') => 'u', // LATIN SMALL LETTER U WITH DIAERESIS BELOW
        mb_chr(0x1E74, 'UTF-8') => 'U', // LATIN CAPITAL LETTER U WITH TILDE BELOW
        mb_chr(0x1E75, 'UTF-8') => 'u', // LATIN SMALL LETTER U WITH TILDE BELOW
        mb_chr(0x1E76, 'UTF-8') => 'U', // LATIN CAPITAL LETTER U WITH CIRCUMFLEX BELOW
        mb_chr(0x1E77, 'UTF-8') => 'u', // LATIN SMALL LETTER U WITH CIRCUMFLEX BELOW
        mb_chr(0x1E78, 'UTF-8') => 'U', // LATIN CAPITAL LETTER U WITH TILDE AND ACUTE
        mb_chr(0x1E79, 'UTF-8') => 'u', // LATIN SMALL LETTER U WITH TILDE AND ACUTE
        mb_chr(0x1E7A, 'UTF-8') => 'U', // LATIN CAPITAL LETTER U WITH MACRON AND DIAERESIS
        mb_chr(0x1E7B, 'UTF-8') => 'u', // LATIN SMALL LETTER U WITH MACRON AND DIAERESIS
        mb_chr(0x1E7C, 'UTF-8') => 'V', // LATIN CAPITAL LETTER V WITH TILDE
        mb_chr(0x1E7D, 'UTF-8') => 'v', // LATIN SMALL LETTER V WITH TILDE
        mb_chr(0x1E7E, 'UTF-8') => 'V', // LATIN CAPITAL LETTER V WITH DOT BELOW
        mb_chr(0x1E7F, 'UTF-8') => 'v', // LATIN SMALL LETTER V WITH DOT BELOW
        mb_chr(0x1E80, 'UTF-8') => 'W', // LATIN CAPITAL LETTER W WITH GRAVE
        mb_chr(0x1E81, 'UTF-8') => 'w', // LATIN SMALL LETTER W WITH GRAVE
        mb_chr(0x1E82, 'UTF-8') => 'W', // LATIN CAPITAL LETTER W WITH ACUTE
        mb_chr(0x1E83, 'UTF-8') => 'w', // LATIN SMALL LETTER W WITH ACUTE
        mb_chr(0x1E84, 'UTF-8') => 'W', // LATIN CAPITAL LETTER W WITH DIAERESIS
        mb_chr(0x1E85, 'UTF-8') => 'w', // LATIN SMALL LETTER W WITH DIAERESIS
        mb_chr(0x1E86, 'UTF-8') => 'W', // LATIN CAPITAL LETTER W WITH DOT ABOVE
        mb_chr(0x1E87, 'UTF-8') => 'w', // LATIN SMALL LETTER W WITH DOT ABOVE
        mb_chr(0x1E88, 'UTF-8') => 'W', // LATIN CAPITAL LETTER W WITH DOT BELOW
        mb_chr(0x1E89, 'UTF-8') => 'w', // LATIN SMALL LETTER W WITH DOT BELOW
        mb_chr(0x1E8A, 'UTF-8') => 'X', // LATIN CAPITAL LETTER X WITH DOT ABOVE
        mb_chr(0x1E8B, 'UTF-8') => 'x', // LATIN SMALL LETTER X WITH DOT ABOVE
        mb_chr(0x1E8C, 'UTF-8') => 'X', // LATIN CAPITAL LETTER X WITH DIAERESIS
        mb_chr(0x1E8D, 'UTF-8') => 'x', // LATIN SMALL LETTER X WITH DIAERESIS
        mb_chr(0x1E8E, 'UTF-8') => 'Y', // LATIN CAPITAL LETTER Y WITH DOT ABOVE
        mb_chr(0x1E8F, 'UTF-8') => 'y', // LATIN SMALL LETTER Y WITH DOT ABOVE
        mb_chr(0x1E90, 'UTF-8') => 'Z', // LATIN CAPITAL LETTER Z WITH CIRCUMFLEX
        mb_chr(0x1E91, 'UTF-8') => 'z', // LATIN SMALL LETTER Z WITH CIRCUMFLEX
        mb_chr(0x1E92, 'UTF-8') => 'Z', // LATIN CAPITAL LETTER Z WITH DOT BELOW
        mb_chr(0x1E93, 'UTF-8') => 'z', // LATIN SMALL LETTER Z WITH DOT BELOW
        mb_chr(0x1E94, 'UTF-8') => 'Z', // LATIN CAPITAL LETTER Z WITH LINE BELOW
        mb_chr(0x1E95, 'UTF-8') => 'z', // LATIN SMALL LETTER Z WITH LINE BELOW
        mb_chr(0x1E96, 'UTF-8') => 'h', // LATIN SMALL LETTER H WITH LINE BELOW
        mb_chr(0x1E97, 'UTF-8') => 't', // LATIN SMALL LETTER T WITH DIAERESIS
        mb_chr(0x1E98, 'UTF-8') => 'w', // LATIN SMALL LETTER W WITH RING ABOVE
        mb_chr(0x1E99, 'UTF-8') => 'y', // LATIN SMALL LETTER Y WITH RING ABOVE
        mb_chr(0x1E9A, 'UTF-8') => 'a', // LATIN SMALL LETTER A WITH RIGHT HALF RING
        mb_chr(0x1E9B, 'UTF-8') => 's', // LATIN SMALL LETTER LONG S WITH DOT ABOVE
        mb_chr(0x1EA0, 'UTF-8') => 'A', // LATIN CAPITAL LETTER A WITH DOT BELOW
        mb_chr(0x1EA1, 'UTF-8') => 'a', // LATIN SMALL LETTER A WITH DOT BELOW
        mb_chr(0x1EA2, 'UTF-8') => 'A', // LATIN CAPITAL LETTER A WITH HOOK ABOVE
        mb_chr(0x1EA3, 'UTF-8') => 'a', // LATIN SMALL LETTER A WITH HOOK ABOVE
        mb_chr(0x1EA4, 'UTF-8') => 'A', // LATIN CAPITAL LETTER A WITH CIRCUMFLEX AND ACUTE
        mb_chr(0x1EA5, 'UTF-8') => 'a', // LATIN SMALL LETTER A WITH CIRCUMFLEX AND ACUTE
        mb_chr(0x1EA6, 'UTF-8') => 'A', // LATIN CAPITAL LETTER A WITH CIRCUMFLEX AND GRAVE
        mb_chr(0x1EA7, 'UTF-8') => 'a', // LATIN SMALL LETTER A WITH CIRCUMFLEX AND GRAVE
        mb_chr(0x1EA8, 'UTF-8') => 'A', // LATIN CAPITAL LETTER A WITH CIRCUMFLEX AND HOOK ABOVE
        mb_chr(0x1EA9, 'UTF-8') => 'a', // LATIN SMALL LETTER A WITH CIRCUMFLEX AND HOOK ABOVE
        mb_chr(0x1EAA, 'UTF-8') => 'A', // LATIN CAPITAL LETTER A WITH CIRCUMFLEX AND TILDE
        mb_chr(0x1EAB, 'UTF-8') => 'a', // LATIN SMALL LETTER A WITH CIRCUMFLEX AND TILDE
        mb_chr(0x1EAC, 'UTF-8') => 'A', // LATIN CAPITAL LETTER A WITH CIRCUMFLEX AND DOT BELOW
        mb_chr(0x1EAD, 'UTF-8') => 'a', // LATIN SMALL LETTER A WITH CIRCUMFLEX AND DOT BELOW
        mb_chr(0x1EAE, 'UTF-8') => 'A', // LATIN CAPITAL LETTER A WITH BREVE AND ACUTE
        mb_chr(0x1EAF, 'UTF-8') => 'a', // LATIN SMALL LETTER A WITH BREVE AND ACUTE
        mb_chr(0x1EB0, 'UTF-8') => 'A', // LATIN CAPITAL LETTER A WITH BREVE AND GRAVE
        mb_chr(0x1EB1, 'UTF-8') => 'a', // LATIN SMALL LETTER A WITH BREVE AND GRAVE
        mb_chr(0x1EB2, 'UTF-8') => 'A', // LATIN CAPITAL LETTER A WITH BREVE AND HOOK ABOVE
        mb_chr(0x1EB3, 'UTF-8') => 'a', // LATIN SMALL LETTER A WITH BREVE AND HOOK ABOVE
        mb_chr(0x1EB4, 'UTF-8') => 'A', // LATIN CAPITAL LETTER A WITH BREVE AND TILDE
        mb_chr(0x1EB5, 'UTF-8') => 'a', // LATIN SMALL LETTER A WITH BREVE AND TILDE
        mb_chr(0x1EB6, 'UTF-8') => 'A', // LATIN CAPITAL LETTER A WITH BREVE AND DOT BELOW
        mb_chr(0x1EB7, 'UTF-8') => 'a', // LATIN SMALL LETTER A WITH BREVE AND DOT BELOW
        mb_chr(0x1EB8, 'UTF-8') => 'E', // LATIN CAPITAL LETTER E WITH DOT BELOW
        mb_chr(0x1EB9, 'UTF-8') => 'e', // LATIN SMALL LETTER E WITH DOT BELOW
        mb_chr(0x1EBA, 'UTF-8') => 'E', // LATIN CAPITAL LETTER E WITH HOOK ABOVE
        mb_chr(0x1EBB, 'UTF-8') => 'e', // LATIN SMALL LETTER E WITH HOOK ABOVE
        mb_chr(0x1EBC, 'UTF-8') => 'E', // LATIN CAPITAL LETTER E WITH TILDE
        mb_chr(0x1EBD, 'UTF-8') => 'e', // LATIN SMALL LETTER E WITH TILDE
        mb_chr(0x1EBE, 'UTF-8') => 'E', // LATIN CAPITAL LETTER E WITH CIRCUMFLEX AND ACUTE
        mb_chr(0x1EBF, 'UTF-8') => 'e', // LATIN SMALL LETTER E WITH CIRCUMFLEX AND ACUTE
        mb_chr(0x1EC0, 'UTF-8') => 'E', // LATIN CAPITAL LETTER E WITH CIRCUMFLEX AND GRAVE
        mb_chr(0x1EC1, 'UTF-8') => 'e', // LATIN SMALL LETTER E WITH CIRCUMFLEX AND GRAVE
        mb_chr(0x1EC2, 'UTF-8') => 'E', // LATIN CAPITAL LETTER E WITH CIRCUMFLEX AND HOOK ABOVE
        mb_chr(0x1EC3, 'UTF-8') => 'e', // LATIN SMALL LETTER E WITH CIRCUMFLEX AND HOOK ABOVE
        mb_chr(0x1EC4, 'UTF-8') => 'E', // LATIN CAPITAL LETTER E WITH CIRCUMFLEX AND TILDE
        mb_chr(0x1EC5, 'UTF-8') => 'e', // LATIN SMALL LETTER E WITH CIRCUMFLEX AND TILDE
        mb_chr(0x1EC6, 'UTF-8') => 'E', // LATIN CAPITAL LETTER E WITH CIRCUMFLEX AND DOT BELOW
        mb_chr(0x1EC7, 'UTF-8') => 'e', // LATIN SMALL LETTER E WITH CIRCUMFLEX AND DOT BELOW
        mb_chr(0x1EC8, 'UTF-8') => 'I', // LATIN CAPITAL LETTER I WITH HOOK ABOVE
        mb_chr(0x1EC9, 'UTF-8') => 'i', // LATIN SMALL LETTER I WITH HOOK ABOVE
        mb_chr(0x1ECA, 'UTF-8') => 'I', // LATIN CAPITAL LETTER I WITH DOT BELOW
        mb_chr(0x1ECB, 'UTF-8') => 'i', // LATIN SMALL LETTER I WITH DOT BELOW
        mb_chr(0x1ECC, 'UTF-8') => 'O', // LATIN CAPITAL LETTER O WITH DOT BELOW
        mb_chr(0x1ECD, 'UTF-8') => 'o', // LATIN SMALL LETTER O WITH DOT BELOW
        mb_chr(0x1ECE, 'UTF-8') => 'O', // LATIN CAPITAL LETTER O WITH HOOK ABOVE
        mb_chr(0x1ECF, 'UTF-8') => 'o', // LATIN SMALL LETTER O WITH HOOK ABOVE
        mb_chr(0x1ED0, 'UTF-8') => 'O', // LATIN CAPITAL LETTER O WITH CIRCUMFLEX AND ACUTE
        mb_chr(0x1ED1, 'UTF-8') => 'o', // LATIN SMALL LETTER O WITH CIRCUMFLEX AND ACUTE
        mb_chr(0x1ED2, 'UTF-8') => 'O', // LATIN CAPITAL LETTER O WITH CIRCUMFLEX AND GRAVE
        mb_chr(0x1ED3, 'UTF-8') => 'o', // LATIN SMALL LETTER O WITH CIRCUMFLEX AND GRAVE
        mb_chr(0x1ED4, 'UTF-8') => 'O', // LATIN CAPITAL LETTER O WITH CIRCUMFLEX AND HOOK ABOVE
        mb_chr(0x1ED5, 'UTF-8') => 'o', // LATIN SMALL LETTER O WITH CIRCUMFLEX AND HOOK ABOVE
        mb_chr(0x1ED6, 'UTF-8') => 'O', // LATIN CAPITAL LETTER O WITH CIRCUMFLEX AND TILDE
        mb_chr(0x1ED7, 'UTF-8') => 'o', // LATIN SMALL LETTER O WITH CIRCUMFLEX AND TILDE
        mb_chr(0x1ED8, 'UTF-8') => 'O', // LATIN CAPITAL LETTER O WITH CIRCUMFLEX AND DOT BELOW
        mb_chr(0x1ED9, 'UTF-8') => 'o', // LATIN SMALL LETTER O WITH CIRCUMFLEX AND DOT BELOW
        mb_chr(0x1EDA, 'UTF-8') => 'O', // LATIN CAPITAL LETTER O WITH HORN AND ACUTE
        mb_chr(0x1EDB, 'UTF-8') => 'o', // LATIN SMALL LETTER O WITH HORN AND ACUTE
        mb_chr(0x1EDC, 'UTF-8') => 'O', // LATIN CAPITAL LETTER O WITH HORN AND GRAVE
        mb_chr(0x1EDD, 'UTF-8') => 'o', // LATIN SMALL LETTER O WITH HORN AND GRAVE
        mb_chr(0x1EDE, 'UTF-8') => 'O', // LATIN CAPITAL LETTER O WITH HORN AND HOOK ABOVE
        mb_chr(0x1EDF, 'UTF-8') => 'o', // LATIN SMALL LETTER O WITH HORN AND HOOK ABOVE
        mb_chr(0x1EE0, 'UTF-8') => 'O', // LATIN CAPITAL LETTER O WITH HORN AND TILDE
        mb_chr(0x1EE1, 'UTF-8') => 'o', // LATIN SMALL LETTER O WITH HORN AND TILDE
        mb_chr(0x1EE2, 'UTF-8') => 'O', // LATIN CAPITAL LETTER O WITH HORN AND DOT BELOW
        mb_chr(0x1EE3, 'UTF-8') => 'o', // LATIN SMALL LETTER O WITH HORN AND DOT BELOW
        mb_chr(0x1EE4, 'UTF-8') => 'U', // LATIN CAPITAL LETTER U WITH DOT BELOW
        mb_chr(0x1EE5, 'UTF-8') => 'u', // LATIN SMALL LETTER U WITH DOT BELOW
        mb_chr(0x1EE6, 'UTF-8') => 'U', // LATIN CAPITAL LETTER U WITH HOOK ABOVE
        mb_chr(0x1EE7, 'UTF-8') => 'u', // LATIN SMALL LETTER U WITH HOOK ABOVE
        mb_chr(0x1EE8, 'UTF-8') => 'U', // LATIN CAPITAL LETTER U WITH HORN AND ACUTE
        mb_chr(0x1EE9, 'UTF-8') => 'u', // LATIN SMALL LETTER U WITH HORN AND ACUTE
        mb_chr(0x1EEA, 'UTF-8') => 'U', // LATIN CAPITAL LETTER U WITH HORN AND GRAVE
        mb_chr(0x1EEB, 'UTF-8') => 'u', // LATIN SMALL LETTER U WITH HORN AND GRAVE
        mb_chr(0x1EEC, 'UTF-8') => 'U', // LATIN CAPITAL LETTER U WITH HORN AND HOOK ABOVE
        mb_chr(0x1EED, 'UTF-8') => 'u', // LATIN SMALL LETTER U WITH HORN AND HOOK ABOVE
        mb_chr(0x1EEE, 'UTF-8') => 'U', // LATIN CAPITAL LETTER U WITH HORN AND TILDE
        mb_chr(0x1EEF, 'UTF-8') => 'u', // LATIN SMALL LETTER U WITH HORN AND TILDE
        mb_chr(0x1EF0, 'UTF-8') => 'U', // LATIN CAPITAL LETTER U WITH HORN AND DOT BELOW
        mb_chr(0x1EF1, 'UTF-8') => 'u', // LATIN SMALL LETTER U WITH HORN AND DOT BELOW
        mb_chr(0x1EF2, 'UTF-8') => 'Y', // LATIN CAPITAL LETTER Y WITH GRAVE
        mb_chr(0x1EF3, 'UTF-8') => 'y', // LATIN SMALL LETTER Y WITH GRAVE
        mb_chr(0x1EF4, 'UTF-8') => 'Y', // LATIN CAPITAL LETTER Y WITH DOT BELOW
        mb_chr(0x1EF5, 'UTF-8') => 'y', // LATIN SMALL LETTER Y WITH DOT BELOW
        mb_chr(0x1EF6, 'UTF-8') => 'Y', // LATIN CAPITAL LETTER Y WITH HOOK ABOVE
        mb_chr(0x1EF7, 'UTF-8') => 'y', // LATIN SMALL LETTER Y WITH HOOK ABOVE
        mb_chr(0x1EF8, 'UTF-8') => 'Y', // LATIN CAPITAL LETTER Y WITH TILDE
        mb_chr(0x1EF9, 'UTF-8') => 'y', // LATIN SMALL LETTER Y WITH TILDE
        mb_chr(0x2071, 'UTF-8') => 'i', // SUPERSCRIPT LATIN SMALL LETTER I
        mb_chr(0x207F, 'UTF-8') => 'n', // SUPERSCRIPT LATIN SMALL LETTER N
        mb_chr(0x212A, 'UTF-8') => 'K', // KELVIN SIGN
        mb_chr(0x212B, 'UTF-8') => 'A', // ANGSTROM SIGN
        mb_chr(0x212C, 'UTF-8') => 'B', // SCRIPT CAPITAL B
        mb_chr(0x212D, 'UTF-8') => 'C', // BLACK-LETTER CAPITAL C
        mb_chr(0x212F, 'UTF-8') => 'e', // SCRIPT SMALL E
        mb_chr(0x2130, 'UTF-8') => 'E', // SCRIPT CAPITAL E
        mb_chr(0x2131, 'UTF-8') => 'F', // SCRIPT CAPITAL F
        mb_chr(0x2132, 'UTF-8') => 'F', // TURNED CAPITAL F -- no decomposition
        mb_chr(0x2133, 'UTF-8') => 'M', // SCRIPT CAPITAL M
        mb_chr(0x2134, 'UTF-8') => '0', // SCRIPT SMALL O
        mb_chr(0x213A, 'UTF-8') => '0', // ROTATED CAPITAL Q -- no decomposition
        mb_chr(0x2141, 'UTF-8') => 'G', // TURNED SANS-SERIF CAPITAL G -- no decomposition
        mb_chr(0x2142, 'UTF-8') => 'L', // TURNED SANS-SERIF CAPITAL L -- no decomposition
        mb_chr(0x2143, 'UTF-8') => 'L', // REVERSED SANS-SERIF CAPITAL L -- no decomposition
        mb_chr(0x2144, 'UTF-8') => 'Y', // TURNED SANS-SERIF CAPITAL Y -- no decomposition
        mb_chr(0x2145, 'UTF-8') => 'D', // DOUBLE-STRUCK ITALIC CAPITAL D
        mb_chr(0x2146, 'UTF-8') => 'd', // DOUBLE-STRUCK ITALIC SMALL D
        mb_chr(0x2147, 'UTF-8') => 'e', // DOUBLE-STRUCK ITALIC SMALL E
        mb_chr(0x2148, 'UTF-8') => 'i', // DOUBLE-STRUCK ITALIC SMALL I
        mb_chr(0x2149, 'UTF-8') => 'j', // DOUBLE-STRUCK ITALIC SMALL J
        mb_chr(0xFB00, 'UTF-8') => 'ff', // LATIN SMALL LIGATURE FF
        mb_chr(0xFB01, 'UTF-8') => 'fi', // LATIN SMALL LIGATURE FI
        mb_chr(0xFB02, 'UTF-8') => 'fl', // LATIN SMALL LIGATURE FL
        mb_chr(0xFB03, 'UTF-8') => 'ffi', // LATIN SMALL LIGATURE FFI
        mb_chr(0xFB04, 'UTF-8') => 'ffl', // LATIN SMALL LIGATURE FFL
        mb_chr(0xFB05, 'UTF-8') => 'st', // LATIN SMALL LIGATURE LONG S T
        mb_chr(0xFB06, 'UTF-8') => 'st', // LATIN SMALL LIGATURE ST
        mb_chr(0xFF21, 'UTF-8') => 'A', // FULLWIDTH LATIN CAPITAL LETTER B
        mb_chr(0xFF22, 'UTF-8') => 'B', // FULLWIDTH LATIN CAPITAL LETTER B
        mb_chr(0xFF23, 'UTF-8') => 'C', // FULLWIDTH LATIN CAPITAL LETTER C
        mb_chr(0xFF24, 'UTF-8') => 'D', // FULLWIDTH LATIN CAPITAL LETTER D
        mb_chr(0xFF25, 'UTF-8') => 'E', // FULLWIDTH LATIN CAPITAL LETTER E
        mb_chr(0xFF26, 'UTF-8') => 'F', // FULLWIDTH LATIN CAPITAL LETTER F
        mb_chr(0xFF27, 'UTF-8') => 'G', // FULLWIDTH LATIN CAPITAL LETTER G
        mb_chr(0xFF28, 'UTF-8') => 'H', // FULLWIDTH LATIN CAPITAL LETTER H
        mb_chr(0xFF29, 'UTF-8') => 'I', // FULLWIDTH LATIN CAPITAL LETTER I
        mb_chr(0xFF2A, 'UTF-8') => 'J', // FULLWIDTH LATIN CAPITAL LETTER J
        mb_chr(0xFF2B, 'UTF-8') => 'K', // FULLWIDTH LATIN CAPITAL LETTER K
        mb_chr(0xFF2C, 'UTF-8') => 'L', // FULLWIDTH LATIN CAPITAL LETTER L
        mb_chr(0xFF2D, 'UTF-8') => 'M', // FULLWIDTH LATIN CAPITAL LETTER M
        mb_chr(0xFF2E, 'UTF-8') => 'N', // FULLWIDTH LATIN CAPITAL LETTER N
        mb_chr(0xFF2F, 'UTF-8') => 'O', // FULLWIDTH LATIN CAPITAL LETTER O
        mb_chr(0xFF30, 'UTF-8') => 'P', // FULLWIDTH LATIN CAPITAL LETTER P
        mb_chr(0xFF31, 'UTF-8') => 'Q', // FULLWIDTH LATIN CAPITAL LETTER Q
        mb_chr(0xFF32, 'UTF-8') => 'R', // FULLWIDTH LATIN CAPITAL LETTER R
        mb_chr(0xFF33, 'UTF-8') => 'S', // FULLWIDTH LATIN CAPITAL LETTER S
        mb_chr(0xFF34, 'UTF-8') => 'T', // FULLWIDTH LATIN CAPITAL LETTER T
        mb_chr(0xFF35, 'UTF-8') => 'U', // FULLWIDTH LATIN CAPITAL LETTER U
        mb_chr(0xFF36, 'UTF-8') => 'V', // FULLWIDTH LATIN CAPITAL LETTER V
        mb_chr(0xFF37, 'UTF-8') => 'W', // FULLWIDTH LATIN CAPITAL LETTER W
        mb_chr(0xFF38, 'UTF-8') => 'X', // FULLWIDTH LATIN CAPITAL LETTER X
        mb_chr(0xFF39, 'UTF-8') => 'Y', // FULLWIDTH LATIN CAPITAL LETTER Y
        mb_chr(0xFF3A, 'UTF-8') => 'Z', // FULLWIDTH LATIN CAPITAL LETTER Z
        mb_chr(0xFF41, 'UTF-8') => 'a', // FULLWIDTH LATIN SMALL LETTER A
        mb_chr(0xFF42, 'UTF-8') => 'b', // FULLWIDTH LATIN SMALL LETTER B
        mb_chr(0xFF43, 'UTF-8') => 'c', // FULLWIDTH LATIN SMALL LETTER C
        mb_chr(0xFF44, 'UTF-8') => 'd', // FULLWIDTH LATIN SMALL LETTER D
        mb_chr(0xFF45, 'UTF-8') => 'e', // FULLWIDTH LATIN SMALL LETTER E
        mb_chr(0xFF46, 'UTF-8') => 'f', // FULLWIDTH LATIN SMALL LETTER F
        mb_chr(0xFF47, 'UTF-8') => 'g', // FULLWIDTH LATIN SMALL LETTER G
        mb_chr(0xFF48, 'UTF-8') => 'h', // FULLWIDTH LATIN SMALL LETTER H
        mb_chr(0xFF49, 'UTF-8') => 'i', // FULLWIDTH LATIN SMALL LETTER I
        mb_chr(0xFF4A, 'UTF-8') => 'j', // FULLWIDTH LATIN SMALL LETTER J
        mb_chr(0xFF4B, 'UTF-8') => 'k', // FULLWIDTH LATIN SMALL LETTER K
        mb_chr(0xFF4C, 'UTF-8') => 'l', // FULLWIDTH LATIN SMALL LETTER L
        mb_chr(0xFF4D, 'UTF-8') => 'm', // FULLWIDTH LATIN SMALL LETTER M
        mb_chr(0xFF4E, 'UTF-8') => 'n', // FULLWIDTH LATIN SMALL LETTER N
        mb_chr(0xFF4F, 'UTF-8') => 'o', // FULLWIDTH LATIN SMALL LETTER O
        mb_chr(0xFF50, 'UTF-8') => 'p', // FULLWIDTH LATIN SMALL LETTER P
        mb_chr(0xFF51, 'UTF-8') => 'q', // FULLWIDTH LATIN SMALL LETTER Q
        mb_chr(0xFF52, 'UTF-8') => 'r', // FULLWIDTH LATIN SMALL LETTER R
        mb_chr(0xFF53, 'UTF-8') => 's', // FULLWIDTH LATIN SMALL LETTER S
        mb_chr(0xFF54, 'UTF-8') => 't', // FULLWIDTH LATIN SMALL LETTER T
        mb_chr(0xFF55, 'UTF-8') => 'u', // FULLWIDTH LATIN SMALL LETTER U
        mb_chr(0xFF56, 'UTF-8') => 'v', // FULLWIDTH LATIN SMALL LETTER V
        mb_chr(0xFF57, 'UTF-8') => 'w', // FULLWIDTH LATIN SMALL LETTER W
        mb_chr(0xFF58, 'UTF-8') => 'x', // FULLWIDTH LATIN SMALL LETTER X
        mb_chr(0xFF59, 'UTF-8') => 'y', // FULLWIDTH LATIN SMALL LETTER Y
        mb_chr(0xFF5A, 'UTF-8') => 'z', // FULLWIDTH LATIN SMALL LETTER Z
        mb_chr(0x0410, 'UTF-8') => 'A', // RUSSIAN CAPITAL LETTER А
        mb_chr(0x0411, 'UTF-8') => 'B', // RUSSIAN CAPITAL LETTER Б
        mb_chr(0x0412, 'UTF-8') => 'V', // RUSSIAN CAPITAL LETTER В
        mb_chr(0x0413, 'UTF-8') => 'G', // RUSSIAN CAPITAL LETTER Г
        mb_chr(0x0414, 'UTF-8') => 'D', // RUSSIAN CAPITAL LETTER Д
        mb_chr(0x0415, 'UTF-8') => 'E', // RUSSIAN CAPITAL LETTER Е
        mb_chr(0x0401, 'UTF-8') => 'YO', // RUSSIAN CAPITAL LETTER Ё
        mb_chr(0x0416, 'UTF-8') => 'ZH', // RUSSIAN CAPITAL LETTER Ж
        mb_chr(0x0417, 'UTF-8') => 'Z', // RUSSIAN CAPITAL LETTER З
        mb_chr(0x0418, 'UTF-8') => 'I', // RUSSIAN CAPITAL LETTER И
        mb_chr(0x0419, 'UTF-8') => 'J', // RUSSIAN CAPITAL LETTER Й
        mb_chr(0x041A, 'UTF-8') => 'K', // RUSSIAN CAPITAL LETTER К
        mb_chr(0x041B, 'UTF-8') => 'L', // RUSSIAN CAPITAL LETTER Л
        mb_chr(0x041C, 'UTF-8') => 'M', // RUSSIAN CAPITAL LETTER М
        mb_chr(0x041D, 'UTF-8') => 'N', // RUSSIAN CAPITAL LETTER Н
        mb_chr(0x041E, 'UTF-8') => 'O', // RUSSIAN CAPITAL LETTER О
        mb_chr(0x041F, 'UTF-8') => 'P', // RUSSIAN CAPITAL LETTER П
        mb_chr(0x0420, 'UTF-8') => 'R', // RUSSIAN CAPITAL LETTER Р
        mb_chr(0x0421, 'UTF-8') => 'S', // RUSSIAN CAPITAL LETTER С
        mb_chr(0x0422, 'UTF-8') => 'T', // RUSSIAN CAPITAL LETTER Т
        mb_chr(0x0423, 'UTF-8') => 'U', // RUSSIAN CAPITAL LETTER У
        mb_chr(0x0424, 'UTF-8') => 'F', // RUSSIAN CAPITAL LETTER Ф
        mb_chr(0x0425, 'UTF-8') => 'H', // RUSSIAN CAPITAL LETTER Х
        mb_chr(0x0426, 'UTF-8') => 'C', // RUSSIAN CAPITAL LETTER Ц
        mb_chr(0x0427, 'UTF-8') => 'CH', // RUSSIAN CAPITAL LETTER Ч
        mb_chr(0x0428, 'UTF-8') => 'SH', // RUSSIAN CAPITAL LETTER Ш
        mb_chr(0x0429, 'UTF-8') => 'SHH', // RUSSIAN CAPITAL LETTER Щ
        mb_chr(0x042A, 'UTF-8') => '', // RUSSIAN CAPITAL LETTER Ъ
        mb_chr(0x042B, 'UTF-8') => 'Y', // RUSSIAN CAPITAL LETTER Ы
        mb_chr(0x042C, 'UTF-8') => '', // RUSSIAN CAPITAL LETTER Ь
        mb_chr(0x042D, 'UTF-8') => 'E', // RUSSIAN CAPITAL LETTER Э
        mb_chr(0x042E, 'UTF-8') => 'YU', // RUSSIAN CAPITAL LETTER Ю
        mb_chr(0x042F, 'UTF-8') => 'YA', // RUSSIAN CAPITAL LETTER Я
        mb_chr(0x0430, 'UTF-8') => 'a', // RUSSIAN SMALL LETTER а
        mb_chr(0x0431, 'UTF-8') => 'b', // RUSSIAN SMALL LETTER б
        mb_chr(0x0432, 'UTF-8') => 'v', // RUSSIAN SMALL LETTER в
        mb_chr(0x0433, 'UTF-8') => 'g', // RUSSIAN SMALL LETTER г
        mb_chr(0x0434, 'UTF-8') => 'd', // RUSSIAN SMALL LETTER д
        mb_chr(0x0435, 'UTF-8') => 'e', // RUSSIAN SMALL LETTER е
        mb_chr(0x0451, 'UTF-8') => 'yo', // RUSSIAN SMALL LETTER ё
        mb_chr(0x0436, 'UTF-8') => 'zh', // RUSSIAN SMALL LETTER ж
        mb_chr(0x0437, 'UTF-8') => 'z', // RUSSIAN SMALL LETTER з
        mb_chr(0x0438, 'UTF-8') => 'i', // RUSSIAN SMALL LETTER и
        mb_chr(0x0439, 'UTF-8') => 'j', // RUSSIAN SMALL LETTER й
        mb_chr(0x043A, 'UTF-8') => 'k', // RUSSIAN SMALL LETTER к
        mb_chr(0x043B, 'UTF-8') => 'l', // RUSSIAN SMALL LETTER л
        mb_chr(0x043C, 'UTF-8') => 'm', // RUSSIAN SMALL LETTER м
        mb_chr(0x043D, 'UTF-8') => 'n', // RUSSIAN SMALL LETTER н
        mb_chr(0x043E, 'UTF-8') => 'o', // RUSSIAN SMALL LETTER о
        mb_chr(0x043F, 'UTF-8') => 'p', // RUSSIAN SMALL LETTER п
        mb_chr(0x0440, 'UTF-8') => 'r', // RUSSIAN SMALL LETTER р
        mb_chr(0x0441, 'UTF-8') => 's', // RUSSIAN SMALL LETTER с
        mb_chr(0x0442, 'UTF-8') => 't', // RUSSIAN SMALL LETTER т
        mb_chr(0x0443, 'UTF-8') => 'u', // RUSSIAN SMALL LETTER у
        mb_chr(0x0444, 'UTF-8') => 'f', // RUSSIAN SMALL LETTER ф
        mb_chr(0x0445, 'UTF-8') => 'h', // RUSSIAN SMALL LETTER х
        mb_chr(0x0446, 'UTF-8') => 'c', // RUSSIAN SMALL LETTER ц
        mb_chr(0x0447, 'UTF-8') => 'ch', // RUSSIAN SMALL LETTER ч
        mb_chr(0x0448, 'UTF-8') => 'sh', // RUSSIAN SMALL LETTER ш
        mb_chr(0x0449, 'UTF-8') => 'shh', // RUSSIAN SMALL LETTER щ
        mb_chr(0x044A, 'UTF-8') => '', // RUSSIAN SMALL LETTER ъ
        mb_chr(0x044B, 'UTF-8') => 'y', // RUSSIAN SMALL LETTER ы
        mb_chr(0x044C, 'UTF-8') => '', // RUSSIAN SMALL LETTER ь
        mb_chr(0x044D, 'UTF-8') => 'e', // RUSSIAN SMALL LETTER э
        mb_chr(0x044E, 'UTF-8') => 'yu', // RUSSIAN SMALL LETTER ю
        mb_chr(0x044F, 'UTF-8') => 'ya', // RUSSIAN SMALL LETTER я
        mb_chr(0x0406, 'UTF-8') => 'I', // Ukraine-Byelorussian CAPITAL LETTER І
        mb_chr(0x0456, 'UTF-8') => 'i', // Ukraine-Byelorussian SMALL LETTER і
        mb_chr(0x0407, 'UTF-8') => 'I', // Ukraine CAPITAL LETTER Ї
        mb_chr(0x0457, 'UTF-8') => 'i', // Ukraine SMALL LETTER ї
        mb_chr(0x0404, 'UTF-8') => 'Ie', // Ukraine CAPITAL LETTER Є
        mb_chr(0x0454, 'UTF-8') => 'ie', // Ukraine SMALL LETTER є
        mb_chr(0x0490, 'UTF-8') => 'G', // Ukraine CAPITAL LETTER Ґ
        mb_chr(0x0491, 'UTF-8') => 'g', // Ukraine SMALL LETTER ґ
        mb_chr(0x040E, 'UTF-8') => 'U', // Byelorussian CAPITAL LETTER Ў
        mb_chr(0x045E, 'UTF-8') => 'u' // Byelorussian SMALL LETTER ў
      );
    }

    /**
     * Gets seo-friendly name
     * @param string $name - Name / The text that will be slugified.
     * @param bool $convertNonWesternChars - A value indicating whether non western chars should be converted.
     * @param bool $allowUnicodeCharsInUrls - A value indicating whether Unicode chars are allowed.
     * @return string Seo-friendly generated name
     */
    public function GetSeoFriendlyName ($name, $convertNonWesternChars = true, $allowUnicodeCharsInUrls = false) {
      // validation
      if (gettype($name) !== 'string' || !$name) return $name;

      $nameArr = static::mb_str_split($name);

      // allowed characters
      $okChars = 'abcdefghijklmnopqrstuvwxyz1234567890 _-';

      // definition of seo-friendly output
      $output = '';

      // loop all characters in name
      for ($x = 0; $x < count($nameArr); $x++) {
        // get the current iterator (character)
        $c = $nameArr[$x];

        // validations
        if ($convertNonWesternChars && array_key_exists($c, $this->_seoCharacterTable)) {
          // if non-western char conversion is enabled
          // try to get lower-case character from seo character table
          $c = mb_strtolower($this->_seoCharacterTable[$c]);
        }

        // validations
        if ($allowUnicodeCharsInUrls) {
          // unicode chars are allowed in URLs

          // validations
          if (preg_match('/[a-zA-Z-0-9]/', $c) || mb_strpos($okChars, $c) !== false) {
            // if the character is letter or digit
            // or the character does exist in 'okChars'
            // append the char to the output
            $output .= $c;
          }
        } elseif ($okChars && $c && mb_strpos($okChars, $c) !== false) {
          // if the unicode chars are not allowed in URLs
          // and the character does exist in 'okChars'
          // append the char to the output
          $output .= $c;
        }
      }

      // prepare output to be returned back
      $output = preg_replace('/\s/', '-', $output);

      while (mb_strpos($output, '--') !== false) {
        $output = preg_replace('/--/', '-', $output);
      }

      while (mb_strpos($output, '__') !== false) {
        $output = preg_replace('/__/', '_', $output);
      }

      if (mb_substr($output, 0, 1) === '-') {
        $output = mb_substr($output, 1, strlen($output));
      }

      if (mb_substr($output, -1) === '-') {
        $output = mb_substr($output, 0, -1);
      }

      // return the output
      return $output;
    }

    /**
     * Polyfill for mb_str_split.
     * Adapted from https://github.com/symfony/polyfill/blob/main/src/Php74/Php74.php
     *
     * @param string $string
     * @param int    $split_length
     * @param string $encoding
     *
     * @return mixed
     */
    public static function mb_str_split($string, $split_length = 1, $encoding = null)
    {
      if (function_exists('mb_str_split')) {
        return mb_str_split($string, $split_length, $encoding);
      }

      if (null !== $string && ! is_scalar($string) && ! (is_object($string) && method_exists($string, '__toString'))) {
        trigger_error('mb_str_split() expects parameter 1 to be string, '.gettype($string).' given', E_USER_WARNING);

        return null;
      }

      if (1 > $split_length = (int) $split_length) {
        trigger_error('The length of each segment must be greater than zero', E_USER_WARNING);

        return false;
      }

      if (null === $encoding) {
        $encoding = mb_internal_encoding();
      }

      if ('UTF-8' === $encoding || in_array(strtoupper($encoding), ['UTF-8', 'UTF8'], true)) {
        return preg_split("/(.{{$split_length}})/u", $string, null, \PREG_SPLIT_DELIM_CAPTURE | PREG_SPLIT_NO_EMPTY);
      }

      $result = [];
      $length = mb_strlen($string, $encoding);

      for ($i = 0; $i < $length; $i += $split_length) {
        $result[] = mb_substr($string, $i, $split_length, $encoding);
      }

      return $result;
    }
  }

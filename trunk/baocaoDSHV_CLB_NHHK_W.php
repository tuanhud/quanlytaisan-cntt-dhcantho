<?php
session_start();
$filename = "report".date('dmY-his').".doc";
header("Content-Type: application/xml; charset=UTF-8");
header("Expires: 0");
header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
header("content-disposition: attachment;filename=$filename");
echo '<?xml version="1.0" encoding="UTF-8" standalone="yes"?>
<?mso-application progid="Word.Document"?>';
?>
<?php
include_once('database.php');
?>
<w:wordDocument xmlns:aml="http://schemas.microsoft.com/aml/2001/core" xmlns:wpc="http://schemas.microsoft.com/office/word/2010/wordprocessingCanvas" xmlns:dt="uuid:C2F41010-65B3-11d1-A29F-00AA00C14882" xmlns:mc="http://schemas.openxmlformats.org/markup-compatibility/2006" xmlns:o="urn:schemas-microsoft-com:office:office" xmlns:v="urn:schemas-microsoft-com:vml" xmlns:w10="urn:schemas-microsoft-com:office:word" xmlns:w="http://schemas.microsoft.com/office/word/2003/wordml" xmlns:wx="http://schemas.microsoft.com/office/word/2003/auxHint" xmlns:wne="http://schemas.microsoft.com/office/word/2006/wordml" xmlns:wsp="http://schemas.microsoft.com/office/word/2003/wordml/sp2" xmlns:sl="http://schemas.microsoft.com/schemaLibrary/2003/core" w:macrosPresent="no" w:embeddedObjPresent="no" w:ocxPresent="no" xml:space="preserve"><w:ignoreSubtree w:val="http://schemas.microsoft.com/office/word/2003/wordml/sp2"/><o:DocumentProperties><o:Author>Namlun12</o:Author><o:LastAuthor>Namlun12</o:LastAuthor><o:Revision>21</o:Revision><o:TotalTime>18</o:TotalTime><o:Created>2012-03-06T02:44:00Z</o:Created><o:LastSaved>2012-03-07T20:44:00Z</o:LastSaved><o:Pages>1</o:Pages><o:Words>132</o:Words><o:Characters>759</o:Characters><o:Lines>6</o:Lines><o:Paragraphs>1</o:Paragraphs><o:CharactersWithSpaces>890</o:CharactersWithSpaces><o:Version>14</o:Version></o:DocumentProperties><w:fonts><w:defaultFonts w:ascii="Calibri" w:fareast="Calibri" w:h-ansi="Calibri" w:cs="Times New Roman"/><w:font w:name="Times New Roman"><w:panose-1 w:val="02020603050405020304"/><w:charset w:val="00"/><w:family w:val="Roman"/><w:pitch w:val="variable"/><w:sig w:usb-0="E0002AFF" w:usb-1="C0007841" w:usb-2="00000009" w:usb-3="00000000" w:csb-0="000001FF" w:csb-1="00000000"/></w:font><w:font w:name="Courier New"><w:panose-1 w:val="02070309020205020404"/><w:charset w:val="00"/><w:family w:val="Modern"/><w:pitch w:val="fixed"/><w:sig w:usb-0="E0002AFF" w:usb-1="C0007843" w:usb-2="00000009" w:usb-3="00000000" w:csb-0="000001FF" w:csb-1="00000000"/></w:font><w:font w:name="Symbol"><w:panose-1 w:val="05050102010706020507"/><w:charset w:val="02"/><w:family w:val="Roman"/><w:pitch w:val="variable"/><w:sig w:usb-0="00000000" w:usb-1="10000000" w:usb-2="00000000" w:usb-3="00000000" w:csb-0="80000000" w:csb-1="00000000"/></w:font><w:font w:name="Wingdings"><w:panose-1 w:val="05000000000000000000"/><w:charset w:val="02"/><w:family w:val="auto"/><w:pitch w:val="variable"/><w:sig w:usb-0="00000000" w:usb-1="10000000" w:usb-2="00000000" w:usb-3="00000000" w:csb-0="80000000" w:csb-1="00000000"/></w:font><w:font w:name="Cambria Math"><w:panose-1 w:val="02040503050406030204"/><w:charset w:val="01"/><w:family w:val="Roman"/><w:notTrueType/><w:pitch w:val="variable"/></w:font><w:font w:name="Calibri"><w:panose-1 w:val="020F0502020204030204"/><w:charset w:val="00"/><w:family w:val="Swiss"/><w:pitch w:val="variable"/><w:sig w:usb-0="E10002FF" w:usb-1="4000ACFF" w:usb-2="00000009" w:usb-3="00000000" w:csb-0="0000019F" w:csb-1="00000000"/></w:font></w:fonts><w:lists><w:listDef w:listDefId="0"><w:lsid w:val="679E740B"/><w:plt w:val="HybridMultilevel"/><w:tmpl w:val="544C4976"/><w:lvl w:ilvl="0" w:tplc="04090001"><w:start w:val="1"/><w:nfc w:val="23"/><w:lvlText w:val=""/><w:lvlJc w:val="left"/><w:pPr><w:ind w:left="720" w:hanging="360"/></w:pPr><w:rPr><w:rFonts w:ascii="Symbol" w:h-ansi="Symbol" w:hint="default"/></w:rPr></w:lvl><w:lvl w:ilvl="1" w:tplc="04090003" w:tentative="on"><w:start w:val="1"/><w:nfc w:val="23"/><w:lvlText w:val="o"/><w:lvlJc w:val="left"/><w:pPr><w:ind w:left="1440" w:hanging="360"/></w:pPr><w:rPr><w:rFonts w:ascii="Courier New" w:h-ansi="Courier New" w:cs="Courier New" w:hint="default"/></w:rPr></w:lvl><w:lvl w:ilvl="2" w:tplc="04090005" w:tentative="on"><w:start w:val="1"/><w:nfc w:val="23"/><w:lvlText w:val=""/><w:lvlJc w:val="left"/><w:pPr><w:ind w:left="2160" w:hanging="360"/></w:pPr><w:rPr><w:rFonts w:ascii="Wingdings" w:h-ansi="Wingdings" w:hint="default"/></w:rPr></w:lvl><w:lvl w:ilvl="3" w:tplc="04090001" w:tentative="on"><w:start w:val="1"/><w:nfc w:val="23"/><w:lvlText w:val=""/><w:lvlJc w:val="left"/><w:pPr><w:ind w:left="2880" w:hanging="360"/></w:pPr><w:rPr><w:rFonts w:ascii="Symbol" w:h-ansi="Symbol" w:hint="default"/></w:rPr></w:lvl><w:lvl w:ilvl="4" w:tplc="04090003" w:tentative="on"><w:start w:val="1"/><w:nfc w:val="23"/><w:lvlText w:val="o"/><w:lvlJc w:val="left"/><w:pPr><w:ind w:left="3600" w:hanging="360"/></w:pPr><w:rPr><w:rFonts w:ascii="Courier New" w:h-ansi="Courier New" w:cs="Courier New" w:hint="default"/></w:rPr></w:lvl><w:lvl w:ilvl="5" w:tplc="04090005" w:tentative="on"><w:start w:val="1"/><w:nfc w:val="23"/><w:lvlText w:val=""/><w:lvlJc w:val="left"/><w:pPr><w:ind w:left="4320" w:hanging="360"/></w:pPr><w:rPr><w:rFonts w:ascii="Wingdings" w:h-ansi="Wingdings" w:hint="default"/></w:rPr></w:lvl><w:lvl w:ilvl="6" w:tplc="04090001" w:tentative="on"><w:start w:val="1"/><w:nfc w:val="23"/><w:lvlText w:val=""/><w:lvlJc w:val="left"/><w:pPr><w:ind w:left="5040" w:hanging="360"/></w:pPr><w:rPr><w:rFonts w:ascii="Symbol" w:h-ansi="Symbol" w:hint="default"/></w:rPr></w:lvl><w:lvl w:ilvl="7" w:tplc="04090003" w:tentative="on"><w:start w:val="1"/><w:nfc w:val="23"/><w:lvlText w:val="o"/><w:lvlJc w:val="left"/><w:pPr><w:ind w:left="5760" w:hanging="360"/></w:pPr><w:rPr><w:rFonts w:ascii="Courier New" w:h-ansi="Courier New" w:cs="Courier New" w:hint="default"/></w:rPr></w:lvl><w:lvl w:ilvl="8" w:tplc="04090005" w:tentative="on"><w:start w:val="1"/><w:nfc w:val="23"/><w:lvlText w:val=""/><w:lvlJc w:val="left"/><w:pPr><w:ind w:left="6480" w:hanging="360"/></w:pPr><w:rPr><w:rFonts w:ascii="Wingdings" w:h-ansi="Wingdings" w:hint="default"/></w:rPr></w:lvl></w:listDef><w:list w:ilfo="1"><w:ilst w:val="0"/></w:list></w:lists><w:styles><w:versionOfBuiltInStylenames w:val="7"/><w:latentStyles w:defLockedState="off" w:latentStyleCount="267"><w:lsdException w:name="Normal"/><w:lsdException w:name="heading 1"/><w:lsdException w:name="heading 2"/><w:lsdException w:name="heading 3"/><w:lsdException w:name="heading 4"/><w:lsdException w:name="heading 5"/><w:lsdException w:name="heading 6"/><w:lsdException w:name="heading 7"/><w:lsdException w:name="heading 8"/><w:lsdException w:name="heading 9"/><w:lsdException w:name="caption"/><w:lsdException w:name="Title"/><w:lsdException w:name="Subtitle"/><w:lsdException w:name="Strong"/><w:lsdException w:name="Emphasis"/><w:lsdException w:name="No Spacing"/><w:lsdException w:name="List Paragraph"/><w:lsdException w:name="Quote"/><w:lsdException w:name="Intense Quote"/><w:lsdException w:name="Subtle Emphasis"/><w:lsdException w:name="Intense Emphasis"/><w:lsdException w:name="Subtle Reference"/><w:lsdException w:name="Intense Reference"/><w:lsdException w:name="Book Title"/><w:lsdException w:name="TOC Heading"/></w:latentStyles><w:style w:type="paragraph" w:default="on" w:styleId="Normal"><w:name w:val="Normal"/><w:rsid w:val="00656373"/><w:pPr><w:spacing w:after="200" w:line="276" w:line-rule="auto"/></w:pPr><w:rPr><wx:font wx:val="Calibri"/><w:sz w:val="22"/><w:sz-cs w:val="22"/><w:lang w:val="EN-US" w:fareast="EN-US" w:bidi="AR-SA"/></w:rPr></w:style><w:style w:type="character" w:default="on" w:styleId="DefaultParagraphFont"><w:name w:val="Default Paragraph Font"/></w:style><w:style w:type="table" w:default="on" w:styleId="TableNormal"><w:name w:val="Normal Table"/><wx:uiName wx:val="Table Normal"/><w:rPr><wx:font wx:val="Calibri"/><w:lang w:val="EN-US" w:fareast="EN-US" w:bidi="AR-SA"/></w:rPr><w:tblPr><w:tblInd w:w="0" w:type="dxa"/><w:tblCellMar><w:top w:w="0" w:type="dxa"/><w:left w:w="108" w:type="dxa"/><w:bottom w:w="0" w:type="dxa"/><w:right w:w="108" w:type="dxa"/></w:tblCellMar></w:tblPr></w:style><w:style w:type="list" w:default="on" w:styleId="NoList"><w:name w:val="No List"/></w:style><w:style w:type="table" w:styleId="TableGrid"><w:name w:val="Table Grid"/><w:basedOn w:val="TableNormal"/><w:rsid w:val="001D77F7"/><w:rPr><wx:font wx:val="Calibri"/></w:rPr><w:tblPr><w:tblInd w:w="0" w:type="dxa"/><w:tblBorders><w:top w:val="single" w:sz="4" wx:bdrwidth="10" w:space="0" w:color="auto"/><w:left w:val="single" w:sz="4" wx:bdrwidth="10" w:space="0" w:color="auto"/><w:bottom w:val="single" w:sz="4" wx:bdrwidth="10" w:space="0" w:color="auto"/><w:right w:val="single" w:sz="4" wx:bdrwidth="10" w:space="0" w:color="auto"/><w:insideH w:val="single" w:sz="4" wx:bdrwidth="10" w:space="0" w:color="auto"/><w:insideV w:val="single" w:sz="4" wx:bdrwidth="10" w:space="0" w:color="auto"/></w:tblBorders><w:tblCellMar><w:top w:w="0" w:type="dxa"/><w:left w:w="108" w:type="dxa"/><w:bottom w:w="0" w:type="dxa"/><w:right w:w="108" w:type="dxa"/></w:tblCellMar></w:tblPr></w:style><w:style w:type="paragraph" w:styleId="NoSpacing"><w:name w:val="No Spacing"/><w:rsid w:val="00B0630D"/><w:rPr><wx:font wx:val="Calibri"/><w:sz w:val="22"/><w:sz-cs w:val="22"/><w:lang w:val="EN-US" w:fareast="EN-US" w:bidi="AR-SA"/></w:rPr></w:style></w:styles><w:shapeDefaults><o:shapedefaults v:ext="edit" spidmax="1026"/><o:shapelayout v:ext="edit"><o:idmap v:ext="edit" data="1"/></o:shapelayout></w:shapeDefaults><w:docPr><w:view w:val="print"/><w:zoom w:percent="100"/><w:doNotEmbedSystemFonts/><w:defaultTabStop w:val="720"/><w:punctuationKerning/><w:characterSpacingControl w:val="DontCompress"/><w:optimizeForBrowser/><w:allowPNG/><w:validateAgainstSchema/><w:saveInvalidXML w:val="off"/><w:ignoreMixedContent w:val="off"/><w:alwaysShowPlaceholderText w:val="off"/><w:compat><w:breakWrappedTables/><w:snapToGridInCell/><w:wrapTextWithPunct/><w:useAsianBreakRules/><w:dontGrowAutofit/></w:compat><wsp:rsids><wsp:rsidRoot wsp:val="001D77F7"/><wsp:rsid wsp:val="00032EC4"/><wsp:rsid wsp:val="000402A7"/><wsp:rsid wsp:val="000B34F6"/><wsp:rsid wsp:val="000D6EED"/><wsp:rsid wsp:val="00147679"/><wsp:rsid wsp:val="00171309"/><wsp:rsid wsp:val="001D77F7"/><wsp:rsid wsp:val="001E7012"/><wsp:rsid wsp:val="00267B2C"/><wsp:rsid wsp:val="002A0FA2"/><wsp:rsid wsp:val="002A5DF0"/><wsp:rsid wsp:val="002B7685"/><wsp:rsid wsp:val="002E4B54"/><wsp:rsid wsp:val="00332D74"/><wsp:rsid wsp:val="00335B66"/><wsp:rsid wsp:val="003725C2"/><wsp:rsid wsp:val="00392FA3"/><wsp:rsid wsp:val="00395232"/><wsp:rsid wsp:val="004B4653"/><wsp:rsid wsp:val="004C524E"/><wsp:rsid wsp:val="004D3CD9"/><wsp:rsid wsp:val="004D5D29"/><wsp:rsid wsp:val="00556129"/><wsp:rsid wsp:val="005D72E8"/><wsp:rsid wsp:val="006527D2"/><wsp:rsid wsp:val="00656373"/><wsp:rsid wsp:val="00793CEA"/><wsp:rsid wsp:val="007B5EEE"/><wsp:rsid wsp:val="007E22C8"/><wsp:rsid wsp:val="008C40CD"/><wsp:rsid wsp:val="008F3236"/><wsp:rsid wsp:val="00951B9D"/><wsp:rsid wsp:val="00953F1A"/><wsp:rsid wsp:val="00966F95"/><wsp:rsid wsp:val="009B71BE"/><wsp:rsid wsp:val="00A24B3C"/><wsp:rsid wsp:val="00A40E9F"/><wsp:rsid wsp:val="00A41E4E"/><wsp:rsid wsp:val="00AA7910"/><wsp:rsid wsp:val="00B0630D"/><wsp:rsid wsp:val="00B6268C"/><wsp:rsid wsp:val="00BA6C7D"/><wsp:rsid wsp:val="00C63D2F"/><wsp:rsid wsp:val="00CB2EED"/><wsp:rsid wsp:val="00D0625A"/><wsp:rsid wsp:val="00D35508"/><wsp:rsid wsp:val="00D450B4"/><wsp:rsid wsp:val="00D46289"/><wsp:rsid wsp:val="00D5151D"/><wsp:rsid wsp:val="00DC486F"/><wsp:rsid wsp:val="00DE413E"/><wsp:rsid wsp:val="00F533A1"/><wsp:rsid wsp:val="00F56780"/><wsp:rsid wsp:val="00F60062"/><wsp:rsid wsp:val="00F8738C"/><wsp:rsid wsp:val="00F948C7"/><wsp:rsid wsp:val="00FD1006"/><wsp:rsid wsp:val="00FE1F5A"/></wsp:rsids></w:docPr><w:body><wx:sect><w:tbl><w:tblPr><w:tblW w:w="10445" w:type="dxa"/><w:jc w:val="center"/><w:tblInd w:w="-342" w:type="dxa"/><w:tblLook w:val="04A0"/></w:tblPr><w:tblGrid><w:gridCol w:w="2258"/><w:gridCol w:w="3835"/><w:gridCol w:w="4352"/></w:tblGrid><w:tr wsp:rsidR="00F8738C" wsp:rsidRPr="001D77F7" wsp:rsidTr="00332D74"><w:trPr><w:jc w:val="center"/></w:trPr><w:tc><w:tcPr><w:tcW w:w="2163" w:type="dxa"/><w:vmerge w:val="restart"/><w:shd w:val="clear" w:color="auto" w:fill="auto"/></w:tcPr><w:p wsp:rsidR="00F8738C" wsp:rsidRPr="001D77F7" wsp:rsidRDefault="00FD1006" wsp:rsidP="001D77F7"><w:pPr><w:spacing w:after="0" w:line="240" w:line-rule="auto"/><w:rPr><w:rFonts w:ascii="Times New Roman" w:h-ansi="Times New Roman"/><wx:font wx:val="Times New Roman"/><w:sz w:val="26"/><w:sz-cs w:val="26"/></w:rPr></w:pPr><w:r wsp:rsidRPr="00FD1006"><w:rPr><w:rFonts w:ascii="Times New Roman" w:h-ansi="Times New Roman"/><wx:font wx:val="Times New Roman"/><w:sz w:val="26"/><w:sz-cs w:val="26"/></w:rPr><w:pict><v:shapetype id="_x0000_t75" coordsize="21600,21600" o:spt="75" o:preferrelative="t" path="m@4@5l@4@11@9@11@9@5xe" filled="f" stroked="f"><v:stroke joinstyle="miter"/><v:formulas><v:f eqn="if lineDrawn pixelLineWidth 0"/><v:f eqn="sum @0 1 0"/><v:f eqn="sum 0 0 @1"/><v:f eqn="prod @2 1 2"/><v:f eqn="prod @3 21600 pixelWidth"/><v:f eqn="prod @3 21600 pixelHeight"/><v:f eqn="sum @0 0 1"/><v:f eqn="prod @6 1 2"/><v:f eqn="prod @7 21600 pixelWidth"/><v:f eqn="sum @8 21600 0"/><v:f eqn="prod @7 21600 pixelHeight"/><v:f eqn="sum @10 21600 0"/></v:formulas><v:path o:extrusionok="f" gradientshapeok="t" o:connecttype="rect"/><o:lock v:ext="edit" aspectratio="t"/></v:shapetype><w:binData w:name="wordml://03000001.png" xml:space="preserve">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
</w:binData><v:shape id="_x0000_i1025" type="#_x0000_t75" style="width:102pt;height:102pt"><v:imagedata src="wordml://03000001.png" o:title="logo"/></v:shape></w:pict></w:r></w:p></w:tc><w:tc><w:tcPr><w:tcW w:w="3876" w:type="dxa"/><w:shd w:val="clear" w:color="auto" w:fill="auto"/></w:tcPr><w:p wsp:rsidR="00F8738C" wsp:rsidRPr="001D77F7" wsp:rsidRDefault="00F8738C" wsp:rsidP="000D6EED"><w:pPr><w:spacing w:after="0" w:line="240" w:line-rule="auto"/><w:jc w:val="center"/><w:rPr><w:rFonts w:ascii="Times New Roman" w:h-ansi="Times New Roman"/><wx:font wx:val="Times New Roman"/><w:sz w:val="26"/><w:sz-cs w:val="26"/></w:rPr></w:pPr><w:r wsp:rsidRPr="001D77F7"><w:rPr><w:rFonts w:ascii="Times New Roman" w:h-ansi="Times New Roman"/><wx:font wx:val="Times New Roman"/><w:sz w:val="26"/><w:sz-cs w:val="26"/></w:rPr><w:t>HỘI SINH VIÊN VIỆT NAM TP CẦN THƠ</w:t></w:r></w:p></w:tc><w:tc><w:tcPr><w:tcW w:w="4406" w:type="dxa"/><w:shd w:val="clear" w:color="auto" w:fill="auto"/></w:tcPr><w:p wsp:rsidR="00F8738C" wsp:rsidRPr="001D77F7" wsp:rsidRDefault="00F8738C" wsp:rsidP="000D6EED"><w:pPr><w:spacing w:after="0" w:line="240" w:line-rule="auto"/><w:jc w:val="center"/><w:rPr><w:rFonts w:ascii="Times New Roman" w:h-ansi="Times New Roman"/><wx:font wx:val="Times New Roman"/><w:sz w:val="26"/><w:sz-cs w:val="26"/></w:rPr></w:pPr><w:r wsp:rsidRPr="001D77F7"><w:rPr><w:rFonts w:ascii="Times New Roman" w:h-ansi="Times New Roman"/><wx:font wx:val="Times New Roman"/><w:sz w:val="26"/><w:sz-cs w:val="26"/></w:rPr><w:t>CỘNG HÒA XÃ HỘI CHỦ NGHĨA VIỆT NAM</w:t></w:r></w:p></w:tc></w:tr><w:tr wsp:rsidR="00F8738C" wsp:rsidRPr="001D77F7" wsp:rsidTr="00332D74"><w:trPr><w:jc w:val="center"/></w:trPr><w:tc><w:tcPr><w:tcW w:w="2163" w:type="dxa"/><w:vmerge/><w:shd w:val="clear" w:color="auto" w:fill="auto"/></w:tcPr><w:p wsp:rsidR="00F8738C" wsp:rsidRPr="001D77F7" wsp:rsidRDefault="00F8738C" wsp:rsidP="001D77F7"><w:pPr><w:spacing w:after="0" w:line="240" w:line-rule="auto"/><w:rPr><w:rFonts w:ascii="Times New Roman" w:h-ansi="Times New Roman"/><wx:font wx:val="Times New Roman"/><w:sz w:val="26"/><w:sz-cs w:val="26"/></w:rPr></w:pPr></w:p></w:tc><w:tc><w:tcPr><w:tcW w:w="3876" w:type="dxa"/><w:shd w:val="clear" w:color="auto" w:fill="auto"/></w:tcPr><w:p wsp:rsidR="009B71BE" wsp:rsidRDefault="00F8738C" wsp:rsidP="000D6EED"><w:pPr><w:spacing w:after="0" w:line="240" w:line-rule="auto"/><w:jc w:val="center"/><w:rPr><w:rFonts w:ascii="Times New Roman" w:h-ansi="Times New Roman"/><wx:font wx:val="Times New Roman"/><w:b/><w:sz w:val="26"/><w:sz-cs w:val="26"/></w:rPr></w:pPr><w:r wsp:rsidRPr="001D77F7"><w:rPr><w:rFonts w:ascii="Times New Roman" w:h-ansi="Times New Roman"/><wx:font wx:val="Times New Roman"/><w:b/><w:sz w:val="26"/><w:sz-cs w:val="26"/></w:rPr><w:t>BCH TRƯỜNG ĐẠI HỌC </w:t></w:r></w:p><w:p wsp:rsidR="00F8738C" wsp:rsidRPr="001D77F7" wsp:rsidRDefault="00F8738C" wsp:rsidP="000D6EED"><w:pPr><w:spacing w:after="0" w:line="240" w:line-rule="auto"/><w:jc w:val="center"/><w:rPr><w:rFonts w:ascii="Times New Roman" w:h-ansi="Times New Roman"/><wx:font wx:val="Times New Roman"/><w:b/><w:sz w:val="26"/><w:sz-cs w:val="26"/></w:rPr></w:pPr><w:r wsp:rsidRPr="001D77F7"><w:rPr><w:rFonts w:ascii="Times New Roman" w:h-ansi="Times New Roman"/><wx:font wx:val="Times New Roman"/><w:b/><w:sz w:val="26"/><w:sz-cs w:val="26"/></w:rPr><w:t>CẦN THƠ</w:t></w:r></w:p></w:tc><w:tc><w:tcPr><w:tcW w:w="4406" w:type="dxa"/><w:shd w:val="clear" w:color="auto" w:fill="auto"/></w:tcPr><w:p wsp:rsidR="00F8738C" wsp:rsidRPr="001D77F7" wsp:rsidRDefault="00F8738C" wsp:rsidP="000D6EED"><w:pPr><w:spacing w:after="0" w:line="240" w:line-rule="auto"/><w:jc w:val="center"/><w:rPr><w:rFonts w:ascii="Times New Roman" w:h-ansi="Times New Roman"/><wx:font wx:val="Times New Roman"/><w:sz w:val="26"/><w:sz-cs w:val="26"/></w:rPr></w:pPr><w:r wsp:rsidRPr="001D77F7"><w:rPr><w:rFonts w:ascii="Times New Roman" w:h-ansi="Times New Roman"/><wx:font wx:val="Times New Roman"/><w:sz w:val="26"/><w:sz-cs w:val="26"/></w:rPr><w:t>Độc lập – Tự do – Hạnh phúc</w:t></w:r></w:p></w:tc></w:tr><w:tr wsp:rsidR="00F8738C" wsp:rsidRPr="001D77F7" wsp:rsidTr="00332D74"><w:trPr><w:jc w:val="center"/></w:trPr><w:tc><w:tcPr><w:tcW w:w="2163" w:type="dxa"/><w:vmerge/><w:shd w:val="clear" w:color="auto" w:fill="auto"/></w:tcPr><w:p wsp:rsidR="00F8738C" wsp:rsidRPr="001D77F7" wsp:rsidRDefault="00F8738C" wsp:rsidP="001D77F7"><w:pPr><w:spacing w:after="0" w:line="240" w:line-rule="auto"/><w:rPr><w:rFonts w:ascii="Times New Roman" w:h-ansi="Times New Roman"/><wx:font wx:val="Times New Roman"/><w:sz w:val="26"/><w:sz-cs w:val="26"/></w:rPr></w:pPr></w:p></w:tc><w:tc><w:tcPr><w:tcW w:w="3876" w:type="dxa"/><w:shd w:val="clear" w:color="auto" w:fill="auto"/></w:tcPr><w:p wsp:rsidR="00F8738C" wsp:rsidRPr="001D77F7" wsp:rsidRDefault="00F8738C" wsp:rsidP="000D6EED"><w:pPr><w:spacing w:after="0" w:line="240" w:line-rule="auto"/><w:jc w:val="center"/><w:rPr><w:rFonts w:ascii="Times New Roman" w:h-ansi="Times New Roman"/><wx:font wx:val="Times New Roman"/><w:sz w:val="26"/><w:sz-cs w:val="26"/></w:rPr></w:pPr><w:r><w:rPr><w:rFonts w:ascii="Times New Roman" w:h-ansi="Times New Roman"/><wx:font wx:val="Times New Roman"/><w:sz w:val="26"/><w:sz-cs w:val="26"/></w:rPr><w:t>-------------------------</w:t></w:r></w:p></w:tc><w:tc><w:tcPr><w:tcW w:w="4406" w:type="dxa"/><w:shd w:val="clear" w:color="auto" w:fill="auto"/></w:tcPr><w:p wsp:rsidR="00F8738C" wsp:rsidRPr="001D77F7" wsp:rsidRDefault="00F8738C" wsp:rsidP="000D6EED"><w:pPr><w:spacing w:after="0" w:line="240" w:line-rule="auto"/><w:jc w:val="center"/><w:rPr><w:rFonts w:ascii="Times New Roman" w:h-ansi="Times New Roman"/><wx:font wx:val="Times New Roman"/><w:sz w:val="26"/><w:sz-cs w:val="26"/></w:rPr></w:pPr><w:r><w:rPr><w:rFonts w:ascii="Times New Roman" w:h-ansi="Times New Roman"/><wx:font wx:val="Times New Roman"/><w:sz w:val="26"/><w:sz-cs w:val="26"/></w:rPr><w:t>--------------------------</w:t></w:r></w:p></w:tc></w:tr><w:tr wsp:rsidR="00F8738C" wsp:rsidRPr="001D77F7" wsp:rsidTr="00332D74"><w:trPr><w:jc w:val="center"/></w:trPr><w:tc><w:tcPr><w:tcW w:w="2163" w:type="dxa"/><w:vmerge/><w:shd w:val="clear" w:color="auto" w:fill="auto"/></w:tcPr><w:p wsp:rsidR="00F8738C" wsp:rsidRPr="001D77F7" wsp:rsidRDefault="00F8738C" wsp:rsidP="001D77F7"><w:pPr><w:spacing w:after="0" w:line="240" w:line-rule="auto"/><w:rPr><w:rFonts w:ascii="Times New Roman" w:h-ansi="Times New Roman"/><wx:font wx:val="Times New Roman"/><w:sz w:val="26"/><w:sz-cs w:val="26"/></w:rPr></w:pPr></w:p></w:tc><w:tc><w:tcPr><w:tcW w:w="3876" w:type="dxa"/><w:shd w:val="clear" w:color="auto" w:fill="auto"/><w:vAlign w:val="center"/></w:tcPr><w:p wsp:rsidR="00F8738C" wsp:rsidRPr="001D77F7" wsp:rsidRDefault="00F8738C" wsp:rsidP="006527D2"><w:pPr><w:spacing w:after="0" w:line="240" w:line-rule="auto"/><w:jc w:val="center"/><w:rPr><w:rFonts w:ascii="Times New Roman" w:h-ansi="Times New Roman"/><wx:font wx:val="Times New Roman"/><w:sz w:val="26"/><w:sz-cs w:val="26"/></w:rPr></w:pPr><w:r><w:rPr><w:rFonts w:ascii="Times New Roman" w:h-ansi="Times New Roman"/><wx:font wx:val="Times New Roman"/><w:sz w:val="26"/><w:sz-cs w:val="26"/></w:rPr><w:t>SỐ: …….</w:t></w:r></w:p></w:tc><w:tc><w:tcPr><w:tcW w:w="4406" w:type="dxa"/><w:shd w:val="clear" w:color="auto" w:fill="auto"/></w:tcPr><w:p wsp:rsidR="00F8738C" wsp:rsidRPr="001D77F7" wsp:rsidRDefault="00F8738C" wsp:rsidP="000D6EED"><w:pPr><w:spacing w:after="0" w:line="240" w:line-rule="auto"/><w:jc w:val="center"/><w:rPr><w:rFonts w:ascii="Times New Roman" w:h-ansi="Times New Roman"/><wx:font wx:val="Times New Roman"/><w:sz w:val="26"/><w:sz-cs w:val="26"/></w:rPr></w:pPr></w:p></w:tc></w:tr><w:tr wsp:rsidR="004C524E" wsp:rsidRPr="001D77F7" wsp:rsidTr="00332D74"><w:trPr><w:jc w:val="center"/></w:trPr><w:tc><w:tcPr><w:tcW w:w="2163" w:type="dxa"/><w:shd w:val="clear" w:color="auto" w:fill="auto"/></w:tcPr><w:p wsp:rsidR="001D77F7" wsp:rsidRPr="001D77F7" wsp:rsidRDefault="001D77F7" wsp:rsidP="001D77F7"><w:pPr><w:spacing w:after="0" w:line="240" w:line-rule="auto"/><w:rPr><w:rFonts w:ascii="Times New Roman" w:h-ansi="Times New Roman"/><wx:font wx:val="Times New Roman"/><w:sz w:val="26"/><w:sz-cs w:val="26"/></w:rPr></w:pPr></w:p></w:tc><w:tc><w:tcPr><w:tcW w:w="3876" w:type="dxa"/><w:shd w:val="clear" w:color="auto" w:fill="auto"/></w:tcPr><w:p wsp:rsidR="001D77F7" wsp:rsidRPr="00147679" wsp:rsidRDefault="00953F1A" wsp:rsidP="006527D2"><w:pPr><w:spacing w:after="0" w:line="240" w:line-rule="auto"/><w:jc w:val="center"/><w:rPr><w:rFonts w:ascii="Times New Roman" w:h-ansi="Times New Roman"/><wx:font wx:val="Times New Roman"/><w:i/><w:sz w:val="26"/><w:sz-cs w:val="26"/></w:rPr></w:pPr><w:r wsp:rsidRPr="00147679"><w:rPr><w:rFonts w:ascii="Times New Roman" w:h-ansi="Times New Roman"/><wx:font wx:val="Times New Roman"/><w:i/><w:sz w:val="24"/><w:sz-cs w:val="26"/></w:rPr><w:t>(V/v giới thiệu hội viên tham gia hoạt động…
<?php
if(isset($_SESSION['hocki_ten'])){
echo " học kì ".$_SESSION['hocki_ten'].",";
}
if(isset($_SESSION['namhoc_ten'])){
echo "năm học ".$_SESSION['namhoc_ten'];
	}
?>
)</w:t></w:r></w:p></w:tc><w:tc><w:tcPr><w:tcW w:w="4406" w:type="dxa"/><w:shd w:val="clear" w:color="auto" w:fill="auto"/></w:tcPr><w:p wsp:rsidR="001D77F7" wsp:rsidRPr="00A40E9F" wsp:rsidRDefault="00A40E9F" wsp:rsidP="009B71BE"><w:pPr><w:spacing w:after="0" w:line="240" w:line-rule="auto"/><w:jc w:val="right"/><w:rPr><w:rFonts w:ascii="Times New Roman" w:h-ansi="Times New Roman"/><wx:font wx:val="Times New Roman"/><w:i/><w:sz w:val="26"/><w:sz-cs w:val="26"/></w:rPr></w:pPr><w:r wsp:rsidRPr="00A40E9F"><w:rPr><w:rFonts w:ascii="Times New Roman" w:h-ansi="Times New Roman"/><wx:font wx:val="Times New Roman"/><w:i/><w:sz w:val="26"/><w:sz-cs w:val="26"/></w:rPr><w:t>...., ngày<?php echo date(" d ") ?>tháng<?php echo date(" m ") ?>năm<?php echo date(" Y ") ?></w:t></w:r></w:p></w:tc></w:tr><w:tr wsp:rsidR="00392FA3" wsp:rsidRPr="001D77F7" wsp:rsidTr="00966F95"><w:trPr><w:jc w:val="center"/></w:trPr><w:tc><w:tcPr><w:tcW w:w="10445" w:type="dxa"/><w:gridSpan w:val="3"/><w:shd w:val="clear" w:color="auto" w:fill="auto"/></w:tcPr><w:p wsp:rsidR="00392FA3" wsp:rsidRPr="00392FA3" wsp:rsidRDefault="00392FA3" wsp:rsidP="00392FA3"><w:pPr><w:spacing w:after="0" w:line="240" w:line-rule="auto"/><w:jc w:val="center"/><w:rPr><w:rFonts w:ascii="Times New Roman" w:h-ansi="Times New Roman"/><wx:font wx:val="Times New Roman"/><w:b/><w:i/><w:sz w:val="26"/><w:sz-cs w:val="26"/></w:rPr></w:pPr><w:r wsp:rsidRPr="00392FA3"><w:rPr><w:rFonts w:ascii="Times New Roman" w:h-ansi="Times New Roman"/><wx:font wx:val="Times New Roman"/><w:b/><w:i/><w:sz w:val="32"/><w:sz-cs w:val="26"/></w:rPr><w:t>Kính gửi: Ban chấp hành Đoàn các Khoa, Viện, Bộ môn</w:t></w:r></w:p></w:tc></w:tr><w:tr wsp:rsidR="00F56780" wsp:rsidRPr="001D77F7" wsp:rsidTr="00966F95"><w:trPr><w:jc w:val="center"/></w:trPr><w:tc><w:tcPr><w:tcW w:w="10445" w:type="dxa"/><w:gridSpan w:val="3"/><w:shd w:val="clear" w:color="auto" w:fill="auto"/></w:tcPr><w:p wsp:rsidR="00F56780" wsp:rsidRPr="00F56780" wsp:rsidRDefault="00F56780" wsp:rsidP="00392FA3"><w:pPr><w:spacing w:after="0" w:line="240" w:line-rule="auto"/><w:jc w:val="center"/><w:rPr><w:rFonts w:ascii="Times New Roman" w:h-ansi="Times New Roman"/><wx:font wx:val="Times New Roman"/><w:b/><w:sz w:val="26"/><w:sz-cs w:val="26"/></w:rPr></w:pPr></w:p></w:tc></w:tr><w:tr wsp:rsidR="00C63D2F" wsp:rsidRPr="001D77F7" wsp:rsidTr="00966F95"><w:trPr><w:jc w:val="center"/></w:trPr><w:tc><w:tcPr><w:tcW w:w="10445" w:type="dxa"/><w:gridSpan w:val="3"/><w:shd w:val="clear" w:color="auto" w:fill="auto"/></w:tcPr><w:p wsp:rsidR="00C63D2F" wsp:rsidRPr="00C63D2F" wsp:rsidRDefault="00C63D2F" wsp:rsidP="00C63D2F"><w:pPr><w:spacing w:after="0" w:line="240" w:line-rule="auto"/><w:ind w:first-line="705"/><w:rPr><w:rFonts w:ascii="Times New Roman" w:h-ansi="Times New Roman"/><wx:font wx:val="Times New Roman"/><w:sz w:val="26"/><w:sz-cs w:val="26"/></w:rPr></w:pPr><w:r wsp:rsidRPr="00C63D2F"><w:rPr><w:rFonts w:ascii="Times New Roman" w:fareast="Times New Roman" w:h-ansi="Times New Roman"/><wx:font wx:val="Times New Roman"/><w:sz w:val="26"/><w:sz-cs w:val="26"/></w:rPr><w:t>Nhằm hỗ trợ Đoàn các đơn vị trong công tác ghi nhận, đánh giá hoạt động rèn luyện của sinh viên, Ban thư ký Hội sinh viên trường xin giới thiệu đến các đồng chí danh sách hội viên...
<?php
if(isset($_SESSION['hocki_ten'])){
echo " học kì ".$_SESSION['hocki_ten'].",";
}
if(isset($_SESSION['namhoc_ten'])){
echo "năm học ".$_SESSION['namhoc_ten'];
	}
?>
</w:t></w:r></w:p></w:tc></w:tr><w:tr wsp:rsidR="00F56780" wsp:rsidRPr="001D77F7" wsp:rsidTr="00966F95"><w:trPr><w:jc w:val="center"/></w:trPr><w:tc><w:tcPr><w:tcW w:w="10445" w:type="dxa"/><w:gridSpan w:val="3"/><w:shd w:val="clear" w:color="auto" w:fill="auto"/></w:tcPr><w:p wsp:rsidR="00F56780" wsp:rsidRPr="001D77F7" wsp:rsidRDefault="00F56780" wsp:rsidP="00F56780"><w:pPr><w:spacing w:after="0" w:line="240" w:line-rule="auto"/><w:jc w:val="center"/><w:rPr><w:rFonts w:ascii="Times New Roman" w:h-ansi="Times New Roman"/><wx:font wx:val="Times New Roman"/><w:sz w:val="26"/><w:sz-cs w:val="26"/></w:rPr></w:pPr><w:r><w:rPr><w:rFonts w:ascii="Times New Roman" w:h-ansi="Times New Roman"/><wx:font wx:val="Times New Roman"/><w:sz w:val="26"/><w:sz-cs w:val="26"/></w:rPr><w:t>-----------------------------------------------------------------------</w:t></w:r></w:p></w:tc></w:tr><w:tr wsp:rsidR="00DC486F" wsp:rsidRPr="001D77F7" wsp:rsidTr="00966F95"><w:trPr><w:jc w:val="center"/></w:trPr><w:tc><w:tcPr><w:tcW w:w="10445" w:type="dxa"/><w:gridSpan w:val="3"/><w:shd w:val="clear" w:color="auto" w:fill="auto"/></w:tcPr><w:p wsp:rsidR="00DC486F" wsp:rsidRPr="007E22C8" wsp:rsidRDefault="00DC486F" wsp:rsidP="00DC486F"><w:pPr><w:spacing w:after="0" w:line="240" w:line-rule="auto"/><w:jc w:val="center"/><w:rPr><w:rFonts w:ascii="Times New Roman" w:h-ansi="Times New Roman"/><wx:font wx:val="Times New Roman"/><w:b/><w:sz w:val="26"/><w:sz-cs w:val="26"/></w:rPr></w:pPr><w:r wsp:rsidRPr="007E22C8"><w:rPr><w:rFonts w:ascii="Times New Roman" w:h-ansi="Times New Roman"/><wx:font wx:val="Times New Roman"/><w:b/><w:sz w:val="26"/><w:sz-cs w:val="26"/></w:rPr><w:t>
<?php
if(isset($_SESSION['clb_ten']))
echo "ĐƠN VỊ: CÂU LẠC BỘ ".$_SESSION['clb_ten'];
else echo "DANH SÁCH HỘI VIÊN TẤT CẢ CÂU LẠC BỘ";
?>
</w:t></w:r><w:r wsp:rsidR="004D5D29" wsp:rsidRPr="007E22C8"><w:rPr><w:rFonts w:ascii="Times New Roman" w:h-ansi="Times New Roman"/><wx:font wx:val="Times New Roman"/><w:b/><w:sz w:val="26"/><w:sz-cs w:val="26"/></w:rPr><w:t> </w:t></w:r></w:p></w:tc></w:tr></w:tbl><w:p wsp:rsidR="003725C2" wsp:rsidRDefault="003725C2" wsp:rsidP="00B0630D"><w:pPr><w:pStyle w:val="NoSpacing"/></w:pPr></w:p><w:tbl><w:tblPr><w:tblW w:w="10440" w:type="dxa"/><w:tblInd w:w="-432" w:type="dxa"/><w:tblBorders><w:top w:val="single" w:sz="4" wx:bdrwidth="10" w:space="0" w:color="auto"/><w:left w:val="single" w:sz="4" wx:bdrwidth="10" w:space="0" w:color="auto"/><w:bottom w:val="single" w:sz="4" wx:bdrwidth="10" w:space="0" w:color="auto"/><w:right w:val="single" w:sz="4" wx:bdrwidth="10" w:space="0" w:color="auto"/><w:insideH w:val="single" w:sz="4" wx:bdrwidth="10" w:space="0" w:color="auto"/><w:insideV w:val="single" w:sz="4" wx:bdrwidth="10" w:space="0" w:color="auto"/></w:tblBorders><w:tblLayout w:type="Fixed"/><w:tblLook w:val="04A0"/></w:tblPr><w:tblGrid><w:gridCol w:w="720"/><w:gridCol w:w="2790"/><w:gridCol w:w="1260"/><w:gridCol w:w="3510"/><w:gridCol w:w="2160"/></w:tblGrid>

<?php
$db = new database;
$sql = "
SELECT hoivien_hoten, hoivien.hoivien_id, clb_ten , chuyennganh_ten, hoivien_khoahoc
FROM hoivien, namhoc, hocki, lchsv, chsv, chuyennganh, clb,  hv_clb
WHERE hoivien.hocki_id = hocki.hocki_id
and hocki.namhoc_id = namhoc.namhoc_id
and hoivien.chsv_id  = chsv.chsv_id
and chsv.lchsv_id = lchsv.lchsv_id
and hoivien.hoivien_id = hv_clb.hoivien_id
and hv_clb.clb_id = clb.clb_id
and hoivien.chuyennganh_id = chuyennganh.chuyennganh_id
and hoivien.hoivien_trangthai = 1 ";
if(isset($_SESSION['namhoc_id'])) $sql.=" and hocki.namhoc_id <= '".$_SESSION['namhoc_id']."' ";
if(isset($_SESSION['hocki_id'])) $sql.=" and hoivien.hocki_id <= '".$_SESSION['hocki_id']."' ";
if(isset($_SESSION['clb_id'])) $sql.=" and hv_clb.clb_id = '".$_SESSION['clb_id']."' ";
$db->setQuery($sql);
$result = $db->fetchAll();
$stt = 0;
if(isset($_SESSION['clb_id'])){
echo '
<w:tr wsp:rsidR="00B0630D" wsp:rsidRPr="00AA7910" wsp:rsidTr="00CB2EED"><w:trPr><w:cantSplit/><w:tblHeader/></w:trPr><w:tc><w:tcPr><w:tcW w:w="720" w:type="dxa"/><w:shd w:val="clear" w:color="auto" w:fill="auto"/></w:tcPr><w:p wsp:rsidR="00B0630D" wsp:rsidRPr="00AA7910" wsp:rsidRDefault="00B0630D" wsp:rsidP="008565E1"><w:pPr><w:spacing w:after="0" w:line="240" w:line-rule="auto"/><w:jc w:val="center"/><w:rPr><w:rFonts w:ascii="Times New Roman" w:h-ansi="Times New Roman"/><wx:font wx:val="Times New Roman"/><w:b/><w:sz w:val="26"/><w:sz-cs w:val="26"/></w:rPr></w:pPr><w:r wsp:rsidRPr="00AA7910"><w:rPr><w:rFonts w:ascii="Times New Roman" w:h-ansi="Times New Roman"/><wx:font wx:val="Times New Roman"/><w:b/><w:sz w:val="26"/><w:sz-cs w:val="26"/></w:rPr><w:t>STT</w:t></w:r></w:p></w:tc><w:tc><w:tcPr><w:tcW w:w="2790" w:type="dxa"/><w:shd w:val="clear" w:color="auto" w:fill="auto"/></w:tcPr><w:p wsp:rsidR="00B0630D" wsp:rsidRPr="00AA7910" wsp:rsidRDefault="00B0630D" wsp:rsidP="008565E1"><w:pPr><w:spacing w:after="0" w:line="240" w:line-rule="auto"/><w:jc w:val="center"/><w:rPr><w:rFonts w:ascii="Times New Roman" w:h-ansi="Times New Roman"/><wx:font wx:val="Times New Roman"/><w:b/><w:sz w:val="26"/><w:sz-cs w:val="26"/></w:rPr></w:pPr><w:r wsp:rsidRPr="00AA7910"><w:rPr><w:rFonts w:ascii="Times New Roman" w:h-ansi="Times New Roman"/><wx:font wx:val="Times New Roman"/><w:b/><w:sz w:val="26"/><w:sz-cs w:val="26"/></w:rPr><w:t>HỌ TÊN</w:t></w:r></w:p></w:tc><w:tc><w:tcPr><w:tcW w:w="1260" w:type="dxa"/><w:shd w:val="clear" w:color="auto" w:fill="auto"/></w:tcPr><w:p wsp:rsidR="00B0630D" wsp:rsidRPr="00AA7910" wsp:rsidRDefault="00B0630D" wsp:rsidP="008565E1"><w:pPr><w:spacing w:after="0" w:line="240" w:line-rule="auto"/><w:jc w:val="center"/><w:rPr><w:rFonts w:ascii="Times New Roman" w:h-ansi="Times New Roman"/><wx:font wx:val="Times New Roman"/><w:b/><w:sz w:val="26"/><w:sz-cs w:val="26"/></w:rPr></w:pPr><w:r wsp:rsidRPr="00AA7910"><w:rPr><w:rFonts w:ascii="Times New Roman" w:h-ansi="Times New Roman"/><wx:font wx:val="Times New Roman"/><w:b/><w:sz w:val="26"/><w:sz-cs w:val="26"/></w:rPr><w:t>MSSV</w:t></w:r></w:p></w:tc><w:tc><w:tcPr><w:tcW w:w="3510" w:type="dxa"/><w:shd w:val="clear" w:color="auto" w:fill="auto"/></w:tcPr><w:p wsp:rsidR="00B0630D" wsp:rsidRPr="00AA7910" wsp:rsidRDefault="00B0630D" wsp:rsidP="008565E1"><w:pPr><w:spacing w:after="0" w:line="240" w:line-rule="auto"/><w:jc w:val="center"/><w:rPr><w:rFonts w:ascii="Times New Roman" w:h-ansi="Times New Roman"/><wx:font wx:val="Times New Roman"/><w:b/><w:sz w:val="26"/><w:sz-cs w:val="26"/></w:rPr></w:pPr><w:r wsp:rsidRPr="00AA7910"><w:rPr><w:rFonts w:ascii="Times New Roman" w:h-ansi="Times New Roman"/><wx:font wx:val="Times New Roman"/><w:b/><w:sz w:val="26"/><w:sz-cs w:val="26"/></w:rPr><w:t>LỚP</w:t></w:r></w:p></w:tc><w:tc><w:tcPr><w:tcW w:w="2160" w:type="dxa"/><w:shd w:val="clear" w:color="auto" w:fill="auto"/></w:tcPr><w:p wsp:rsidR="00B0630D" wsp:rsidRPr="00AA7910" wsp:rsidRDefault="00B0630D" wsp:rsidP="008565E1"><w:pPr><w:spacing w:after="0" w:line="240" w:line-rule="auto"/><w:jc w:val="center"/><w:rPr><w:rFonts w:ascii="Times New Roman" w:h-ansi="Times New Roman"/><wx:font wx:val="Times New Roman"/><w:b/><w:sz w:val="26"/><w:sz-cs w:val="26"/></w:rPr></w:pPr><w:r wsp:rsidRPr="00AA7910"><w:rPr><w:rFonts w:ascii="Times New Roman" w:h-ansi="Times New Roman"/><wx:font wx:val="Times New Roman"/><w:b/><w:sz w:val="26"/><w:sz-cs w:val="26"/></w:rPr><w:t>GHI CHÚ</w:t></w:r></w:p></w:tc></w:tr>';	
while($row = mysql_fetch_array($result))
{
$stt+=1;
echo '
<w:tr wsp:rsidR="00FE1F5A" wsp:rsidRPr="00AA7910" wsp:rsidTr="00AA7910">
	<w:tc>
    	<w:tcPr>
        	<w:tcW w:w="790" w:type="dxa"/>
            <w:shd w:val="clear" w:color="auto" w:fill="auto"/>
        </w:tcPr>
        <w:p wsp:rsidR="00FE1F5A" wsp:rsidRPr="00AA7910" wsp:rsidRDefault="00F533A1" wsp:rsidP="00AA7910">
        	<w:pPr>
            	<w:spacing w:after="0" w:line="240" w:line-rule="auto"/>
				<w:jc w:val="center"/>
            	<w:rPr>
            		<w:rFonts w:ascii="Times New Roman" w:h-ansi="Times New Roman"/>
            		<wx:font wx:val="Times New Roman"/>
            		<w:sz w:val="26"/>
            		<w:sz-cs w:val="26"/>
	        	</w:rPr>
        	</w:pPr>
        	<w:r wsp:rsidRPr="00AA7910">
        		<w:rPr>
            		<w:rFonts w:ascii="Times New Roman" w:h-ansi="Times New Roman"/>
	                <wx:font wx:val="Times New Roman"/>
    	            <w:sz w:val="26"/>
        	        <w:sz-cs w:val="26"/>
            	</w:rPr>
            	<w:t>'.$stt.'</w:t>
        	</w:r>
    	</w:p>
	</w:tc>
    <w:tc>
    	<w:tcPr>
        	<w:tcW w:w="2790" w:type="dxa"/>
            <w:shd w:val="clear" w:color="auto" w:fill="auto"/>
        </w:tcPr>
        <w:p wsp:rsidR="00FE1F5A" wsp:rsidRPr="00AA7910" wsp:rsidRDefault="00F533A1" wsp:rsidP="00AA7910">
        	<w:pPr>
            	<w:spacing w:after="0" w:line="240" w:line-rule="auto"/>
            	<w:rPr>
            		<w:rFonts w:ascii="Times New Roman" w:h-ansi="Times New Roman"/>
            		<wx:font wx:val="Times New Roman"/>
                	<w:sz w:val="26"/>
                	<w:sz-cs w:val="26"/>
	            </w:rPr>
            </w:pPr>
            <w:r wsp:rsidRPr="00AA7910">
            	<w:rPr>
                	<w:rFonts w:ascii="Times New Roman" w:h-ansi="Times New Roman"/>
                    <wx:font wx:val="Times New Roman"/>
                    <w:sz w:val="26"/>
                    <w:sz-cs w:val="26"/>
                </w:rPr>
            	<w:t>'.$row[0].'</w:t>
            </w:r>
        </w:p>
    </w:tc>
    <w:tc>
    	<w:tcPr>
        	<w:tcW w:w="1170" w:type="dxa"/>
            <w:shd w:val="clear" w:color="auto" w:fill="auto"/>
        </w:tcPr>
        <w:p wsp:rsidR="00FE1F5A" wsp:rsidRPr="00AA7910" wsp:rsidRDefault="00F533A1" wsp:rsidP="00AA7910">
        	<w:pPr>
            	<w:spacing w:after="0" w:line="240" w:line-rule="auto"/>
            	<w:rPr>
                	<w:rFonts w:ascii="Times New Roman" w:h-ansi="Times New Roman"/>
                    <wx:font wx:val="Times New Roman"/>
                    <w:sz w:val="26"/>
                    <w:sz-cs w:val="26"/>
                </w:rPr>
            </w:pPr>
            <w:r wsp:rsidRPr="00AA7910">
            	<w:rPr>
                	<w:rFonts w:ascii="Times New Roman" w:h-ansi="Times New Roman"/>
                    <wx:font wx:val="Times New Roman"/>
                    <w:sz w:val="26"/>
                    <w:sz-cs w:val="26"/>
                </w:rPr>
                <w:t>'.$row[1].'</w:t>
            </w:r>
        </w:p>
    </w:tc>
    <w:tc>
    	<w:tcPr>
        	<w:tcW w:w="3435" w:type="dxa"/>
            <w:shd w:val="clear" w:color="auto" w:fill="auto"/>
        </w:tcPr>
        <w:p wsp:rsidR="00FE1F5A" wsp:rsidRPr="00AA7910" wsp:rsidRDefault="00F533A1" wsp:rsidP="00AA7910">
        	<w:pPr>
            	<w:spacing w:after="0" w:line="240" w:line-rule="auto"/>
            	<w:rPr>
            		<w:rFonts w:ascii="Times New Roman" w:h-ansi="Times New Roman"/>
		            <wx:font wx:val="Times New Roman"/>
        		    <w:sz w:val="26"/>
		            <w:sz-cs w:val="26"/>
        	    </w:rPr>
            </w:pPr>
            <w:r wsp:rsidRPr="00AA7910">
            	<w:rPr>
                	<w:rFonts w:ascii="Times New Roman" w:h-ansi="Times New Roman"/>
                    <wx:font wx:val="Times New Roman"/>
                    <w:sz w:val="26"/>
                    <w:sz-cs w:val="26"/>
                </w:rPr>
                <w:t>'.$row[3].' – K'.$row[4].'</w:t>
            </w:r>
        </w:p>
    </w:tc>
    <w:tc>
    	<w:tcPr>
        	<w:tcW w:w="2034" w:type="dxa"/>
            <w:shd w:val="clear" w:color="auto" w:fill="auto"/>
        </w:tcPr>
        <w:p wsp:rsidR="00FE1F5A" wsp:rsidRPr="00AA7910" wsp:rsidRDefault="00FE1F5A" wsp:rsidP="00AA7910">
        	<w:pPr>
            	<w:spacing w:after="0" w:line="240" w:line-rule="auto"/>
            	<w:rPr>
                	<w:rFonts w:ascii="Times New Roman" w:h-ansi="Times New Roman"/>
                    <wx:font wx:val="Times New Roman"/>
                    <w:sz w:val="26"/>
                    <w:sz-cs w:val="26"/>
                </w:rPr>
            </w:pPr>
        </w:p>
    </w:tc>
</w:tr>';
	}
}
else {
echo '
<w:tr wsp:rsidR="00B0630D" wsp:rsidRPr="00AA7910" wsp:rsidTr="00CB2EED"><w:trPr><w:cantSplit/><w:tblHeader/></w:trPr><w:tc><w:tcPr><w:tcW w:w="720" w:type="dxa"/><w:shd w:val="clear" w:color="auto" w:fill="auto"/></w:tcPr><w:p wsp:rsidR="00B0630D" wsp:rsidRPr="00AA7910" wsp:rsidRDefault="00B0630D" wsp:rsidP="008565E1"><w:pPr><w:spacing w:after="0" w:line="240" w:line-rule="auto"/><w:jc w:val="center"/><w:rPr><w:rFonts w:ascii="Times New Roman" w:h-ansi="Times New Roman"/><wx:font wx:val="Times New Roman"/><w:b/><w:sz w:val="26"/><w:sz-cs w:val="26"/></w:rPr></w:pPr><w:r wsp:rsidRPr="00AA7910"><w:rPr><w:rFonts w:ascii="Times New Roman" w:h-ansi="Times New Roman"/><wx:font wx:val="Times New Roman"/><w:b/><w:sz w:val="26"/><w:sz-cs w:val="26"/></w:rPr><w:t>STT</w:t></w:r></w:p></w:tc><w:tc><w:tcPr><w:tcW w:w="2790" w:type="dxa"/><w:shd w:val="clear" w:color="auto" w:fill="auto"/></w:tcPr><w:p wsp:rsidR="00B0630D" wsp:rsidRPr="00AA7910" wsp:rsidRDefault="00B0630D" wsp:rsidP="008565E1"><w:pPr><w:spacing w:after="0" w:line="240" w:line-rule="auto"/><w:jc w:val="center"/><w:rPr><w:rFonts w:ascii="Times New Roman" w:h-ansi="Times New Roman"/><wx:font wx:val="Times New Roman"/><w:b/><w:sz w:val="26"/><w:sz-cs w:val="26"/></w:rPr></w:pPr><w:r wsp:rsidRPr="00AA7910"><w:rPr><w:rFonts w:ascii="Times New Roman" w:h-ansi="Times New Roman"/><wx:font wx:val="Times New Roman"/><w:b/><w:sz w:val="26"/><w:sz-cs w:val="26"/></w:rPr><w:t>HỌ TÊN</w:t></w:r></w:p></w:tc>
<w:tc><w:tcPr><w:tcW w:w="1260" w:type="dxa"/><w:shd w:val="clear" w:color="auto" w:fill="auto"/></w:tcPr><w:p wsp:rsidR="00B0630D" wsp:rsidRPr="00AA7910" wsp:rsidRDefault="00B0630D" wsp:rsidP="008565E1"><w:pPr><w:spacing w:after="0" w:line="240" w:line-rule="auto"/><w:jc w:val="center"/><w:rPr><w:rFonts w:ascii="Times New Roman" w:h-ansi="Times New Roman"/><wx:font wx:val="Times New Roman"/><w:b/><w:sz w:val="26"/><w:sz-cs w:val="26"/></w:rPr></w:pPr><w:r wsp:rsidRPr="00AA7910"><w:rPr><w:rFonts w:ascii="Times New Roman" w:h-ansi="Times New Roman"/><wx:font wx:val="Times New Roman"/><w:b/><w:sz w:val="26"/><w:sz-cs w:val="26"/></w:rPr><w:t>MSSV</w:t></w:r></w:p></w:tc>
<w:tc><w:tcPr><w:tcW w:w="1260" w:type="dxa"/><w:shd w:val="clear" w:color="auto" w:fill="auto"/></w:tcPr><w:p wsp:rsidR="00B0630D" wsp:rsidRPr="00AA7910" wsp:rsidRDefault="00B0630D" wsp:rsidP="008565E1"><w:pPr><w:spacing w:after="0" w:line="240" w:line-rule="auto"/><w:jc w:val="center"/><w:rPr><w:rFonts w:ascii="Times New Roman" w:h-ansi="Times New Roman"/><wx:font wx:val="Times New Roman"/><w:b/><w:sz w:val="26"/><w:sz-cs w:val="26"/></w:rPr></w:pPr><w:r wsp:rsidRPr="00AA7910"><w:rPr><w:rFonts w:ascii="Times New Roman" w:h-ansi="Times New Roman"/><wx:font wx:val="Times New Roman"/><w:b/><w:sz w:val="26"/><w:sz-cs w:val="26"/></w:rPr><w:t>CÂU LẠC BỘ</w:t></w:r></w:p></w:tc>
<w:tc><w:tcPr><w:tcW w:w="3510" w:type="dxa"/><w:shd w:val="clear" w:color="auto" w:fill="auto"/></w:tcPr><w:p wsp:rsidR="00B0630D" wsp:rsidRPr="00AA7910" wsp:rsidRDefault="00B0630D" wsp:rsidP="008565E1"><w:pPr><w:spacing w:after="0" w:line="240" w:line-rule="auto"/><w:jc w:val="center"/><w:rPr><w:rFonts w:ascii="Times New Roman" w:h-ansi="Times New Roman"/><wx:font wx:val="Times New Roman"/><w:b/><w:sz w:val="26"/><w:sz-cs w:val="26"/></w:rPr></w:pPr><w:r wsp:rsidRPr="00AA7910"><w:rPr><w:rFonts w:ascii="Times New Roman" w:h-ansi="Times New Roman"/><wx:font wx:val="Times New Roman"/><w:b/><w:sz w:val="26"/><w:sz-cs w:val="26"/></w:rPr><w:t>LỚP</w:t></w:r></w:p></w:tc><w:tc><w:tcPr><w:tcW w:w="2160" w:type="dxa"/><w:shd w:val="clear" w:color="auto" w:fill="auto"/></w:tcPr><w:p wsp:rsidR="00B0630D" wsp:rsidRPr="00AA7910" wsp:rsidRDefault="00B0630D" wsp:rsidP="008565E1"><w:pPr><w:spacing w:after="0" w:line="240" w:line-rule="auto"/><w:jc w:val="center"/><w:rPr><w:rFonts w:ascii="Times New Roman" w:h-ansi="Times New Roman"/><wx:font wx:val="Times New Roman"/><w:b/><w:sz w:val="26"/><w:sz-cs w:val="26"/></w:rPr></w:pPr><w:r wsp:rsidRPr="00AA7910"><w:rPr><w:rFonts w:ascii="Times New Roman" w:h-ansi="Times New Roman"/><wx:font wx:val="Times New Roman"/><w:b/><w:sz w:val="26"/><w:sz-cs w:val="26"/></w:rPr><w:t>GHI CHÚ</w:t></w:r></w:p></w:tc></w:tr>';

while($row = mysql_fetch_array($result))
{
$stt+=1;
echo '
<w:tr wsp:rsidR="00FE1F5A" wsp:rsidRPr="00AA7910" wsp:rsidTr="00AA7910">
	<w:tc>
    	<w:tcPr>
        	<w:tcW w:w="790" w:type="dxa"/>
            <w:shd w:val="clear" w:color="auto" w:fill="auto"/>
        </w:tcPr>
        <w:p wsp:rsidR="00FE1F5A" wsp:rsidRPr="00AA7910" wsp:rsidRDefault="00F533A1" wsp:rsidP="00AA7910">
        	<w:pPr>
            	<w:spacing w:after="0" w:line="240" w:line-rule="auto"/>
				<w:jc w:val="center"/>
            	<w:rPr>
            		<w:rFonts w:ascii="Times New Roman" w:h-ansi="Times New Roman"/>
            		<wx:font wx:val="Times New Roman"/>
            		<w:sz w:val="26"/>
            		<w:sz-cs w:val="26"/>
	        	</w:rPr>
        	</w:pPr>
        	<w:r wsp:rsidRPr="00AA7910">
        		<w:rPr>
            		<w:rFonts w:ascii="Times New Roman" w:h-ansi="Times New Roman"/>
	                <wx:font wx:val="Times New Roman"/>
    	            <w:sz w:val="26"/>
        	        <w:sz-cs w:val="26"/>
            	</w:rPr>
            	<w:t>'.$stt.'</w:t>
        	</w:r>
    	</w:p>
	</w:tc>
    <w:tc>
    	<w:tcPr>
        	<w:tcW w:w="2790" w:type="dxa"/>
            <w:shd w:val="clear" w:color="auto" w:fill="auto"/>
        </w:tcPr>
        <w:p wsp:rsidR="00FE1F5A" wsp:rsidRPr="00AA7910" wsp:rsidRDefault="00F533A1" wsp:rsidP="00AA7910">
        	<w:pPr>
            	<w:spacing w:after="0" w:line="240" w:line-rule="auto"/>
            	<w:rPr>
            		<w:rFonts w:ascii="Times New Roman" w:h-ansi="Times New Roman"/>
            		<wx:font wx:val="Times New Roman"/>
                	<w:sz w:val="26"/>
                	<w:sz-cs w:val="26"/>
	            </w:rPr>
            </w:pPr>
            <w:r wsp:rsidRPr="00AA7910">
            	<w:rPr>
                	<w:rFonts w:ascii="Times New Roman" w:h-ansi="Times New Roman"/>
                    <wx:font wx:val="Times New Roman"/>
                    <w:sz w:val="26"/>
                    <w:sz-cs w:val="26"/>
                </w:rPr>
            	<w:t>'.$row[0].'</w:t>
            </w:r>
        </w:p>
    </w:tc>
    <w:tc>
    	<w:tcPr>
        	<w:tcW w:w="1170" w:type="dxa"/>
            <w:shd w:val="clear" w:color="auto" w:fill="auto"/>
        </w:tcPr>
        <w:p wsp:rsidR="00FE1F5A" wsp:rsidRPr="00AA7910" wsp:rsidRDefault="00F533A1" wsp:rsidP="00AA7910">
        	<w:pPr>
            	<w:spacing w:after="0" w:line="240" w:line-rule="auto"/>
            	<w:rPr>
                	<w:rFonts w:ascii="Times New Roman" w:h-ansi="Times New Roman"/>
                    <wx:font wx:val="Times New Roman"/>
                    <w:sz w:val="26"/>
                    <w:sz-cs w:val="26"/>
                </w:rPr>
            </w:pPr>
            <w:r wsp:rsidRPr="00AA7910">
            	<w:rPr>
                	<w:rFonts w:ascii="Times New Roman" w:h-ansi="Times New Roman"/>
                    <wx:font wx:val="Times New Roman"/>
                    <w:sz w:val="26"/>
                    <w:sz-cs w:val="26"/>
                </w:rPr>
                <w:t>'.$row[1].'</w:t>
            </w:r>
        </w:p>
    </w:tc>
	    <w:tc>
    	<w:tcPr>
        	<w:tcW w:w="3435" w:type="dxa"/>
            <w:shd w:val="clear" w:color="auto" w:fill="auto"/>
        </w:tcPr>
        <w:p wsp:rsidR="00FE1F5A" wsp:rsidRPr="00AA7910" wsp:rsidRDefault="00F533A1" wsp:rsidP="00AA7910">
        	<w:pPr>
            	<w:spacing w:after="0" w:line="240" w:line-rule="auto"/>
            	<w:rPr>
            		<w:rFonts w:ascii="Times New Roman" w:h-ansi="Times New Roman"/>
		            <wx:font wx:val="Times New Roman"/>
        		    <w:sz w:val="26"/>
		            <w:sz-cs w:val="26"/>
        	    </w:rPr>
            </w:pPr>
            <w:r wsp:rsidRPr="00AA7910">
            	<w:rPr>
                	<w:rFonts w:ascii="Times New Roman" w:h-ansi="Times New Roman"/>
                    <wx:font wx:val="Times New Roman"/>
                    <w:sz w:val="26"/>
                    <w:sz-cs w:val="26"/>
                </w:rPr>
                <w:t>'.$row[2].'</w:t>
            </w:r>
        </w:p>
    </w:tc>
    <w:tc>
    	<w:tcPr>
        	<w:tcW w:w="3435" w:type="dxa"/>
            <w:shd w:val="clear" w:color="auto" w:fill="auto"/>
        </w:tcPr>
        <w:p wsp:rsidR="00FE1F5A" wsp:rsidRPr="00AA7910" wsp:rsidRDefault="00F533A1" wsp:rsidP="00AA7910">
        	<w:pPr>
            	<w:spacing w:after="0" w:line="240" w:line-rule="auto"/>
            	<w:rPr>
            		<w:rFonts w:ascii="Times New Roman" w:h-ansi="Times New Roman"/>
		            <wx:font wx:val="Times New Roman"/>
        		    <w:sz w:val="26"/>
		            <w:sz-cs w:val="26"/>
        	    </w:rPr>
            </w:pPr>
            <w:r wsp:rsidRPr="00AA7910">
            	<w:rPr>
                	<w:rFonts w:ascii="Times New Roman" w:h-ansi="Times New Roman"/>
                    <wx:font wx:val="Times New Roman"/>
                    <w:sz w:val="26"/>
                    <w:sz-cs w:val="26"/>
                </w:rPr>
                <w:t>'.$row[3].' – K'.$row[4].'</w:t>
            </w:r>
        </w:p>
    </w:tc>
    <w:tc>
    	<w:tcPr>
        	<w:tcW w:w="2034" w:type="dxa"/>
            <w:shd w:val="clear" w:color="auto" w:fill="auto"/>
        </w:tcPr>
        <w:p wsp:rsidR="00FE1F5A" wsp:rsidRPr="00AA7910" wsp:rsidRDefault="00FE1F5A" wsp:rsidP="00AA7910">
        	<w:pPr>
            	<w:spacing w:after="0" w:line="240" w:line-rule="auto"/>
            	<w:rPr>
                	<w:rFonts w:ascii="Times New Roman" w:h-ansi="Times New Roman"/>
                    <wx:font wx:val="Times New Roman"/>
                    <w:sz w:val="26"/>
                    <w:sz-cs w:val="26"/>
                </w:rPr>
            </w:pPr>
        </w:p>
    </w:tc>
</w:tr>';
	}
}
?>

</w:tbl><w:p wsp:rsidR="00B0630D" wsp:rsidRDefault="00B0630D" wsp:rsidP="00D35508"><w:pPr><w:pStyle w:val="NoSpacing"/></w:pPr></w:p><w:tbl><w:tblPr><w:tblW w:w="10445" w:type="dxa"/><w:jc w:val="center"/><w:tblInd w:w="-342" w:type="dxa"/><w:tblLook w:val="04A0"/></w:tblPr><w:tblGrid><w:gridCol w:w="2258"/><w:gridCol w:w="3781"/><w:gridCol w:w="4406"/></w:tblGrid><w:tr wsp:rsidR="00D35508" wsp:rsidRPr="001D77F7" wsp:rsidTr="001E7012"><w:trPr><w:jc w:val="center"/></w:trPr><w:tc><w:tcPr><w:tcW w:w="10445" w:type="dxa"/><w:gridSpan w:val="3"/><w:shd w:val="clear" w:color="auto" w:fill="auto"/></w:tcPr><w:p wsp:rsidR="00D35508" wsp:rsidRPr="00267B2C" wsp:rsidRDefault="00D35508" wsp:rsidP="008565E1"><w:pPr><w:spacing w:after="0" w:line="240" w:line-rule="auto"/><w:rPr><w:rFonts w:ascii="Times New Roman" w:h-ansi="Times New Roman"/><wx:font wx:val="Times New Roman"/><w:i/><w:sz w:val="26"/><w:sz-cs w:val="26"/></w:rPr></w:pPr><w:r wsp:rsidRPr="00267B2C"><w:rPr><w:rFonts w:ascii="Times New Roman" w:h-ansi="Times New Roman"/><wx:font wx:val="Times New Roman"/><w:i/><w:sz w:val="26"/><w:sz-cs w:val="26"/></w:rPr><w:t>Danh sách có <?=$stt?> hội viên</w:t></w:r></w:p></w:tc></w:tr><w:tr wsp:rsidR="00D35508" wsp:rsidRPr="001D77F7" wsp:rsidTr="001E7012"><w:trPr><w:jc w:val="center"/></w:trPr><w:tc><w:tcPr><w:tcW w:w="2258" w:type="dxa"/><w:shd w:val="clear" w:color="auto" w:fill="auto"/></w:tcPr><w:p wsp:rsidR="00D35508" wsp:rsidRPr="001D77F7" wsp:rsidRDefault="00D35508" wsp:rsidP="008565E1"><w:pPr><w:spacing w:after="0" w:line="240" w:line-rule="auto"/><w:rPr><w:rFonts w:ascii="Times New Roman" w:h-ansi="Times New Roman"/><wx:font wx:val="Times New Roman"/><w:sz w:val="26"/><w:sz-cs w:val="26"/></w:rPr></w:pPr></w:p></w:tc><w:tc><w:tcPr><w:tcW w:w="3781" w:type="dxa"/><w:shd w:val="clear" w:color="auto" w:fill="auto"/></w:tcPr><w:p wsp:rsidR="00D35508" wsp:rsidRPr="001D77F7" wsp:rsidRDefault="00D35508" wsp:rsidP="008565E1"><w:pPr><w:spacing w:after="0" w:line="240" w:line-rule="auto"/><w:rPr><w:rFonts w:ascii="Times New Roman" w:h-ansi="Times New Roman"/><wx:font wx:val="Times New Roman"/><w:sz w:val="26"/><w:sz-cs w:val="26"/></w:rPr></w:pPr></w:p></w:tc><w:tc><w:tcPr><w:tcW w:w="4406" w:type="dxa"/><w:shd w:val="clear" w:color="auto" w:fill="auto"/></w:tcPr><w:p wsp:rsidR="00D35508" wsp:rsidRPr="00D46289" wsp:rsidRDefault="00D35508" wsp:rsidP="008565E1"><w:pPr><w:spacing w:after="0" w:line="240" w:line-rule="auto"/><w:jc w:val="center"/><w:rPr><w:rFonts w:ascii="Times New Roman" w:h-ansi="Times New Roman"/><wx:font wx:val="Times New Roman"/><w:b/><w:sz w:val="26"/><w:sz-cs w:val="26"/></w:rPr></w:pPr><w:r wsp:rsidRPr="00D46289"><w:rPr><w:rFonts w:ascii="Times New Roman" w:h-ansi="Times New Roman"/><wx:font wx:val="Times New Roman"/><w:b/><w:sz w:val="26"/><w:sz-cs w:val="26"/></w:rPr><w:t>TM. BAN THƯ KÝ HỘI SINH VIÊN</w:t></w:r></w:p><w:p wsp:rsidR="00D35508" wsp:rsidRPr="00D46289" wsp:rsidRDefault="00D35508" wsp:rsidP="008565E1"><w:pPr><w:spacing w:after="0" w:line="240" w:line-rule="auto"/><w:jc w:val="center"/><w:rPr><w:rFonts w:ascii="Times New Roman" w:h-ansi="Times New Roman"/><wx:font wx:val="Times New Roman"/><w:b/><w:sz w:val="26"/><w:sz-cs w:val="26"/></w:rPr></w:pPr><w:r wsp:rsidRPr="00D46289"><w:rPr><w:rFonts w:ascii="Times New Roman" w:h-ansi="Times New Roman"/><wx:font wx:val="Times New Roman"/><w:b/><w:sz w:val="26"/><w:sz-cs w:val="26"/></w:rPr><w:t>TRƯỜNG ĐẠI HỌC CẦN THƠ</w:t></w:r></w:p><w:p wsp:rsidR="00D35508" wsp:rsidRPr="001D77F7" wsp:rsidRDefault="00D35508" wsp:rsidP="008565E1"><w:pPr><w:spacing w:after="0" w:line="240" w:line-rule="auto"/><w:jc w:val="center"/><w:rPr><w:rFonts w:ascii="Times New Roman" w:h-ansi="Times New Roman"/><wx:font wx:val="Times New Roman"/><w:sz w:val="26"/><w:sz-cs w:val="26"/></w:rPr></w:pPr><w:r wsp:rsidRPr="00D46289"><w:rPr><w:rFonts w:ascii="Times New Roman" w:h-ansi="Times New Roman"/><wx:font wx:val="Times New Roman"/><w:b/><w:sz w:val="26"/><w:sz-cs w:val="26"/></w:rPr><w:t>PHÓ CHỦ TỊCH</w:t></w:r></w:p></w:tc></w:tr><w:tr wsp:rsidR="00D35508" wsp:rsidRPr="001D77F7" wsp:rsidTr="001E7012"><w:trPr><w:jc w:val="center"/></w:trPr><w:tc><w:tcPr><w:tcW w:w="2258" w:type="dxa"/><w:shd w:val="clear" w:color="auto" w:fill="auto"/></w:tcPr><w:p wsp:rsidR="00D35508" wsp:rsidRPr="001D77F7" wsp:rsidRDefault="00D35508" wsp:rsidP="008565E1"><w:pPr><w:spacing w:after="0" w:line="240" w:line-rule="auto"/><w:rPr><w:rFonts w:ascii="Times New Roman" w:h-ansi="Times New Roman"/><wx:font wx:val="Times New Roman"/><w:sz w:val="26"/><w:sz-cs w:val="26"/></w:rPr></w:pPr></w:p></w:tc><w:tc><w:tcPr><w:tcW w:w="3781" w:type="dxa"/><w:shd w:val="clear" w:color="auto" w:fill="auto"/></w:tcPr><w:p wsp:rsidR="00D35508" wsp:rsidRPr="001D77F7" wsp:rsidRDefault="00D35508" wsp:rsidP="008565E1"><w:pPr><w:spacing w:after="0" w:line="240" w:line-rule="auto"/><w:rPr><w:rFonts w:ascii="Times New Roman" w:h-ansi="Times New Roman"/><wx:font wx:val="Times New Roman"/><w:sz w:val="26"/><w:sz-cs w:val="26"/></w:rPr></w:pPr></w:p></w:tc><w:tc><w:tcPr><w:tcW w:w="4406" w:type="dxa"/><w:shd w:val="clear" w:color="auto" w:fill="auto"/></w:tcPr><w:p wsp:rsidR="00D35508" wsp:rsidRPr="001D77F7" wsp:rsidRDefault="00D35508" wsp:rsidP="008565E1"><w:pPr><w:spacing w:after="0" w:line="240" w:line-rule="auto"/><w:rPr><w:rFonts w:ascii="Times New Roman" w:h-ansi="Times New Roman"/><wx:font wx:val="Times New Roman"/><w:sz w:val="26"/><w:sz-cs w:val="26"/></w:rPr></w:pPr></w:p></w:tc></w:tr><w:tr wsp:rsidR="00D35508" wsp:rsidRPr="001D77F7" wsp:rsidTr="001E7012"><w:trPr><w:jc w:val="center"/></w:trPr><w:tc><w:tcPr><w:tcW w:w="2258" w:type="dxa"/><w:shd w:val="clear" w:color="auto" w:fill="auto"/></w:tcPr><w:p wsp:rsidR="00D35508" wsp:rsidRPr="001D77F7" wsp:rsidRDefault="00D35508" wsp:rsidP="008565E1"><w:pPr><w:spacing w:after="0" w:line="240" w:line-rule="auto"/><w:rPr><w:rFonts w:ascii="Times New Roman" w:h-ansi="Times New Roman"/><wx:font wx:val="Times New Roman"/><w:sz w:val="26"/><w:sz-cs w:val="26"/></w:rPr></w:pPr></w:p></w:tc><w:tc><w:tcPr><w:tcW w:w="3781" w:type="dxa"/><w:shd w:val="clear" w:color="auto" w:fill="auto"/></w:tcPr><w:p wsp:rsidR="00D35508" wsp:rsidRPr="001D77F7" wsp:rsidRDefault="00D35508" wsp:rsidP="008565E1"><w:pPr><w:spacing w:after="0" w:line="240" w:line-rule="auto"/><w:rPr><w:rFonts w:ascii="Times New Roman" w:h-ansi="Times New Roman"/><wx:font wx:val="Times New Roman"/><w:sz w:val="26"/><w:sz-cs w:val="26"/></w:rPr></w:pPr></w:p></w:tc><w:tc><w:tcPr><w:tcW w:w="4406" w:type="dxa"/><w:shd w:val="clear" w:color="auto" w:fill="auto"/></w:tcPr><w:p wsp:rsidR="00D35508" wsp:rsidRPr="001D77F7" wsp:rsidRDefault="00D35508" wsp:rsidP="008565E1"><w:pPr><w:spacing w:after="0" w:line="240" w:line-rule="auto"/><w:rPr><w:rFonts w:ascii="Times New Roman" w:h-ansi="Times New Roman"/><wx:font wx:val="Times New Roman"/><w:sz w:val="26"/><w:sz-cs w:val="26"/></w:rPr></w:pPr></w:p></w:tc></w:tr><w:tr wsp:rsidR="00D35508" wsp:rsidRPr="001D77F7" wsp:rsidTr="001E7012"><w:trPr><w:jc w:val="center"/></w:trPr><w:tc><w:tcPr><w:tcW w:w="2258" w:type="dxa"/><w:shd w:val="clear" w:color="auto" w:fill="auto"/></w:tcPr><w:p wsp:rsidR="00D35508" wsp:rsidRPr="001D77F7" wsp:rsidRDefault="00D35508" wsp:rsidP="008565E1"><w:pPr><w:spacing w:after="0" w:line="240" w:line-rule="auto"/><w:rPr><w:rFonts w:ascii="Times New Roman" w:h-ansi="Times New Roman"/><wx:font wx:val="Times New Roman"/><w:sz w:val="26"/><w:sz-cs w:val="26"/></w:rPr></w:pPr></w:p></w:tc><w:tc><w:tcPr><w:tcW w:w="3781" w:type="dxa"/><w:shd w:val="clear" w:color="auto" w:fill="auto"/></w:tcPr><w:p wsp:rsidR="00D35508" wsp:rsidRPr="001D77F7" wsp:rsidRDefault="00D35508" wsp:rsidP="008565E1"><w:pPr><w:spacing w:after="0" w:line="240" w:line-rule="auto"/><w:rPr><w:rFonts w:ascii="Times New Roman" w:h-ansi="Times New Roman"/><wx:font wx:val="Times New Roman"/><w:sz w:val="26"/><w:sz-cs w:val="26"/></w:rPr></w:pPr></w:p></w:tc><w:tc><w:tcPr><w:tcW w:w="4406" w:type="dxa"/><w:shd w:val="clear" w:color="auto" w:fill="auto"/></w:tcPr><w:p wsp:rsidR="00D35508" wsp:rsidRPr="001D77F7" wsp:rsidRDefault="00D35508" wsp:rsidP="008565E1"><w:pPr><w:spacing w:after="0" w:line="240" w:line-rule="auto"/><w:rPr><w:rFonts w:ascii="Times New Roman" w:h-ansi="Times New Roman"/><wx:font wx:val="Times New Roman"/><w:sz w:val="26"/><w:sz-cs w:val="26"/></w:rPr></w:pPr></w:p></w:tc></w:tr><w:tr wsp:rsidR="00D35508" wsp:rsidRPr="001D77F7" wsp:rsidTr="001E7012"><w:trPr><w:jc w:val="center"/></w:trPr><w:tc><w:tcPr><w:tcW w:w="2258" w:type="dxa"/><w:shd w:val="clear" w:color="auto" w:fill="auto"/></w:tcPr><w:p wsp:rsidR="00D35508" wsp:rsidRPr="001D77F7" wsp:rsidRDefault="00D35508" wsp:rsidP="008565E1"><w:pPr><w:spacing w:after="0" w:line="240" w:line-rule="auto"/><w:rPr><w:rFonts w:ascii="Times New Roman" w:h-ansi="Times New Roman"/><wx:font wx:val="Times New Roman"/><w:sz w:val="26"/><w:sz-cs w:val="26"/></w:rPr></w:pPr></w:p></w:tc><w:tc><w:tcPr><w:tcW w:w="3781" w:type="dxa"/><w:shd w:val="clear" w:color="auto" w:fill="auto"/></w:tcPr><w:p wsp:rsidR="00D35508" wsp:rsidRPr="001D77F7" wsp:rsidRDefault="00D35508" wsp:rsidP="008565E1"><w:pPr><w:spacing w:after="0" w:line="240" w:line-rule="auto"/><w:rPr><w:rFonts w:ascii="Times New Roman" w:h-ansi="Times New Roman"/><wx:font wx:val="Times New Roman"/><w:sz w:val="26"/><w:sz-cs w:val="26"/></w:rPr></w:pPr></w:p></w:tc><w:tc><w:tcPr><w:tcW w:w="4406" w:type="dxa"/><w:shd w:val="clear" w:color="auto" w:fill="auto"/></w:tcPr><w:p wsp:rsidR="00D35508" wsp:rsidRPr="001D77F7" wsp:rsidRDefault="00D35508" wsp:rsidP="008565E1"><w:pPr><w:spacing w:after="0" w:line="240" w:line-rule="auto"/><w:rPr><w:rFonts w:ascii="Times New Roman" w:h-ansi="Times New Roman"/><wx:font wx:val="Times New Roman"/><w:sz w:val="26"/><w:sz-cs w:val="26"/></w:rPr></w:pPr></w:p></w:tc></w:tr><w:tr wsp:rsidR="00D35508" wsp:rsidRPr="001D77F7" wsp:rsidTr="001E7012"><w:trPr><w:jc w:val="center"/></w:trPr><w:tc><w:tcPr><w:tcW w:w="2258" w:type="dxa"/><w:shd w:val="clear" w:color="auto" w:fill="auto"/></w:tcPr><w:p wsp:rsidR="00D35508" wsp:rsidRPr="001D77F7" wsp:rsidRDefault="00D35508" wsp:rsidP="008565E1"><w:pPr><w:spacing w:after="0" w:line="240" w:line-rule="auto"/><w:rPr><w:rFonts w:ascii="Times New Roman" w:h-ansi="Times New Roman"/><wx:font wx:val="Times New Roman"/><w:sz w:val="26"/><w:sz-cs w:val="26"/></w:rPr></w:pPr></w:p></w:tc><w:tc><w:tcPr><w:tcW w:w="3781" w:type="dxa"/><w:shd w:val="clear" w:color="auto" w:fill="auto"/></w:tcPr><w:p wsp:rsidR="00D35508" wsp:rsidRPr="001D77F7" wsp:rsidRDefault="00D35508" wsp:rsidP="008565E1"><w:pPr><w:spacing w:after="0" w:line="240" w:line-rule="auto"/><w:rPr><w:rFonts w:ascii="Times New Roman" w:h-ansi="Times New Roman"/><wx:font wx:val="Times New Roman"/><w:sz w:val="26"/><w:sz-cs w:val="26"/></w:rPr></w:pPr></w:p></w:tc><w:tc><w:tcPr><w:tcW w:w="4406" w:type="dxa"/><w:shd w:val="clear" w:color="auto" w:fill="auto"/></w:tcPr><w:p wsp:rsidR="00D35508" wsp:rsidRPr="001D77F7" wsp:rsidRDefault="00D35508" wsp:rsidP="008565E1"><w:pPr><w:spacing w:after="0" w:line="240" w:line-rule="auto"/><w:rPr><w:rFonts w:ascii="Times New Roman" w:h-ansi="Times New Roman"/><wx:font wx:val="Times New Roman"/><w:sz w:val="26"/><w:sz-cs w:val="26"/></w:rPr></w:pPr></w:p></w:tc></w:tr><w:tr wsp:rsidR="00D35508" wsp:rsidRPr="001D77F7" wsp:rsidTr="001E7012"><w:trPr><w:jc w:val="center"/></w:trPr><w:tc><w:tcPr><w:tcW w:w="2258" w:type="dxa"/><w:shd w:val="clear" w:color="auto" w:fill="auto"/></w:tcPr><w:p wsp:rsidR="00D35508" wsp:rsidRPr="001D77F7" wsp:rsidRDefault="00D35508" wsp:rsidP="008565E1"><w:pPr><w:spacing w:after="0" w:line="240" w:line-rule="auto"/><w:rPr><w:rFonts w:ascii="Times New Roman" w:h-ansi="Times New Roman"/><wx:font wx:val="Times New Roman"/><w:sz w:val="26"/><w:sz-cs w:val="26"/></w:rPr></w:pPr></w:p></w:tc><w:tc><w:tcPr><w:tcW w:w="3781" w:type="dxa"/><w:shd w:val="clear" w:color="auto" w:fill="auto"/></w:tcPr><w:p wsp:rsidR="00D35508" wsp:rsidRPr="001D77F7" wsp:rsidRDefault="00D35508" wsp:rsidP="008565E1"><w:pPr><w:spacing w:after="0" w:line="240" w:line-rule="auto"/><w:rPr><w:rFonts w:ascii="Times New Roman" w:h-ansi="Times New Roman"/><wx:font wx:val="Times New Roman"/><w:sz w:val="26"/><w:sz-cs w:val="26"/></w:rPr></w:pPr></w:p></w:tc><w:tc><w:tcPr><w:tcW w:w="4406" w:type="dxa"/><w:shd w:val="clear" w:color="auto" w:fill="auto"/></w:tcPr><w:p wsp:rsidR="00D35508" wsp:rsidRPr="001D77F7" wsp:rsidRDefault="00D35508" wsp:rsidP="008565E1"><w:pPr><w:spacing w:after="0" w:line="240" w:line-rule="auto"/><w:jc w:val="center"/><w:rPr><w:rFonts w:ascii="Times New Roman" w:h-ansi="Times New Roman"/><wx:font wx:val="Times New Roman"/><w:sz w:val="26"/><w:sz-cs w:val="26"/></w:rPr></w:pPr><w:r><w:rPr><w:rFonts w:ascii="Times New Roman" w:h-ansi="Times New Roman"/><wx:font wx:val="Times New Roman"/><w:sz w:val="26"/><w:sz-cs w:val="26"/></w:rPr><w:t>………………………………………...</w:t></w:r></w:p></w:tc></w:tr><w:tr wsp:rsidR="00D35508" wsp:rsidRPr="001D77F7" wsp:rsidTr="001E7012"><w:trPr><w:jc w:val="center"/></w:trPr><w:tc><w:tcPr><w:tcW w:w="2258" w:type="dxa"/><w:shd w:val="clear" w:color="auto" w:fill="auto"/></w:tcPr><w:p wsp:rsidR="00D35508" wsp:rsidRDefault="00D35508" wsp:rsidP="008565E1"><w:pPr><w:spacing w:after="0" w:line="240" w:line-rule="auto"/><w:rPr><w:rFonts w:ascii="Times New Roman" w:h-ansi="Times New Roman"/><wx:font wx:val="Times New Roman"/><w:sz w:val="26"/><w:sz-cs w:val="26"/></w:rPr></w:pPr><w:r><w:rPr><w:rFonts w:ascii="Times New Roman" w:h-ansi="Times New Roman"/><wx:font wx:val="Times New Roman"/><w:sz w:val="26"/><w:sz-cs w:val="26"/></w:rPr><w:t>Nơi nhận: </w:t></w:r></w:p><w:p wsp:rsidR="00D35508" wsp:rsidRPr="005D72E8" wsp:rsidRDefault="00D35508" wsp:rsidP="008565E1"><w:pPr><w:listPr><w:ilvl w:val="0"/><w:ilfo w:val="1"/><wx:t wx:val="·"/><wx:font wx:val="Symbol"/></w:listPr><w:spacing w:after="0" w:line="240" w:line-rule="auto"/><w:ind w:left="525"/><w:rPr><w:rFonts w:ascii="Times New Roman" w:h-ansi="Times New Roman"/><wx:font wx:val="Times New Roman"/><w:i/><w:sz w:val="26"/><w:sz-cs w:val="26"/></w:rPr></w:pPr><w:r wsp:rsidRPr="005D72E8"><w:rPr><w:rFonts w:ascii="Times New Roman" w:h-ansi="Times New Roman"/><wx:font wx:val="Times New Roman"/><w:i/><w:sz w:val="26"/><w:sz-cs w:val="26"/></w:rPr><w:t>Như kính gửi</w:t></w:r></w:p><w:p wsp:rsidR="00D35508" wsp:rsidRPr="001D77F7" wsp:rsidRDefault="00D35508" wsp:rsidP="008565E1"><w:pPr><w:listPr><w:ilvl w:val="0"/><w:ilfo w:val="1"/><wx:t wx:val="·"/><wx:font wx:val="Symbol"/></w:listPr><w:spacing w:after="0" w:line="240" w:line-rule="auto"/><w:ind w:left="525"/><w:rPr><w:rFonts w:ascii="Times New Roman" w:h-ansi="Times New Roman"/><wx:font wx:val="Times New Roman"/><w:sz w:val="26"/><w:sz-cs w:val="26"/></w:rPr></w:pPr><w:r wsp:rsidRPr="005D72E8"><w:rPr><w:rFonts w:ascii="Times New Roman" w:h-ansi="Times New Roman"/><wx:font wx:val="Times New Roman"/><w:i/><w:sz w:val="26"/><w:sz-cs w:val="26"/></w:rPr><w:t>Lưu VP</w:t></w:r></w:p></w:tc><w:tc><w:tcPr><w:tcW w:w="3781" w:type="dxa"/><w:shd w:val="clear" w:color="auto" w:fill="auto"/></w:tcPr><w:p wsp:rsidR="00D35508" wsp:rsidRPr="001D77F7" wsp:rsidRDefault="00D35508" wsp:rsidP="008565E1"><w:pPr><w:spacing w:after="0" w:line="240" w:line-rule="auto"/><w:rPr><w:rFonts w:ascii="Times New Roman" w:h-ansi="Times New Roman"/><wx:font wx:val="Times New Roman"/><w:sz w:val="26"/><w:sz-cs w:val="26"/></w:rPr></w:pPr></w:p></w:tc><w:tc><w:tcPr><w:tcW w:w="4406" w:type="dxa"/><w:shd w:val="clear" w:color="auto" w:fill="auto"/></w:tcPr><w:p wsp:rsidR="00D35508" wsp:rsidRDefault="00D35508" wsp:rsidP="008565E1"><w:pPr><w:spacing w:after="0" w:line="240" w:line-rule="auto"/><w:jc w:val="center"/><w:rPr><w:rFonts w:ascii="Times New Roman" w:h-ansi="Times New Roman"/><wx:font wx:val="Times New Roman"/><w:sz w:val="26"/><w:sz-cs w:val="26"/></w:rPr></w:pPr></w:p></w:tc></w:tr></w:tbl><w:p wsp:rsidR="00D35508" wsp:rsidRDefault="00D35508"><w:pPr><w:rPr><w:rFonts w:ascii="Times New Roman" w:h-ansi="Times New Roman"/><wx:font wx:val="Times New Roman"/><w:sz w:val="26"/><w:sz-cs w:val="26"/></w:rPr></w:pPr></w:p><w:p wsp:rsidR="00D35508" wsp:rsidRPr="001D77F7" wsp:rsidRDefault="00D35508"><w:pPr><w:rPr><w:rFonts w:ascii="Times New Roman" w:h-ansi="Times New Roman"/><wx:font wx:val="Times New Roman"/><w:sz w:val="26"/><w:sz-cs w:val="26"/></w:rPr></w:pPr></w:p><w:sectPr wsp:rsidR="00D35508" wsp:rsidRPr="001D77F7" wsp:rsidSect="00656373"><w:pgSz w:w="12240" w:h="15840"/><w:pgMar w:top="1440" w:right="1440" w:bottom="1440" w:left="1440" w:header="720" w:footer="720" w:gutter="0"/><w:cols w:space="720"/><w:docGrid w:line-pitch="360"/></w:sectPr></wx:sect></w:body></w:wordDocument>
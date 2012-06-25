function initwidgets() {
    var source = ["Item 1", "Item 2", "Item 3", "Item 4", "Item 5"];
    var theme = 'custom';	
    $("#jqxmenu").jqxMenu({ width: 230, height: 30, theme: theme, autoSizeMainItems: true });
    $("#jqxtabs").jqxTabs({ width: 200, height: 100, theme: theme });
    $("#jqxnavigationbar").jqxNavigationBar({ sizeMode: 'fitAvailableHeight', width: 200, height: 150, theme: theme });
    $("#jqxcalendar").jqxCalendar({ width: 200, height: 200, theme: theme });
    $("#jqxlistbox").jqxListBox({ selectedIndex: 0, source: source, width: 200, autoHeight: true, theme: theme });
    $("#jqxdropdownlist").jqxDropDownList({ selectedIndex: 0, theme: theme, source: source, autoDropDownHeight: true, width: 200, height: 25 });
    $("#jqxcombobox").jqxComboBox({ selectedIndex: 0, theme: theme, source: source, autoDropDownHeight: true, width: 200, height: 25 });
    $("#jqxdatetimeinput").jqxDateTimeInput({ width: 200, height: 25, theme: theme });
    $("#jqxmaskedinput").jqxMaskedInput({ mask: '(###)###-####', width: 200, height: 25, theme: theme });
    $("#jqxnumberinput").jqxNumberInput({ width: 200, height: 25, spinButtons: true, theme: theme });
    $("#jqxbutton").jqxButton({ width: 100, height: 25, theme: theme });
    $("#jqxlinkbutton").jqxLinkButton({ width: 100, height: 25, theme: theme });
    $("#jqxcheckbox").jqxCheckBox({ width: 100, height: 25, checked: true, theme: theme });
    $("#jqxradiobutton").jqxRadioButton({ width: 100, height: 25, checked: true, theme: theme });
    $("#jqxradiobutton2").jqxRadioButton({ width: 100, height: 25, theme: theme });
    $("#jqxprogressbar").jqxProgressBar({ width: 200, height: 25, value: 50, theme: theme });
    $("#jqxslider").jqxSlider({ width: 200, height: 25, value: 5, theme: theme });
    $('#jqxsplitter').jqxSplitter({ width: 200, height: 200, theme: theme, panels: [{ size: 100 }, { size: 100}] });
    $('#jqxtree').jqxTree({ width: 200, theme: theme });
    $('#jqxdocking').jqxDocking({ orientation: 'horizontal', width: 200, mode: 'default', theme: theme });
    $('#jqxpanel').jqxPanel({ width: 200, height: 200, theme: theme });
       
    // prepare the data
    var data = new Array();

    var firstNames =
            [
                "Andrew", "Nancy", "Shelley", "Regina", "Yoshi", "Antoni", "Mayumi", "Ian", "Peter", "Lars", "Petra", "Martin", "Sven", "Elio", "Beate", "Cheryl", "Michael", "Guylene"
            ];

    var lastNames =
            [
                "Fuller", "Davolio", "Burke", "Murphy", "Nagase", "Saavedra", "Ohno", "Devling", "Wilson", "Peterson", "Winkler", "Bein", "Petersen", "Rossi", "Vileid", "Saylor", "Bjorn", "Nodier"
            ];

    var productNames =
            [
                "Black Tea", "Green Tea", "Caffe Espresso", "Doubleshot Espresso", "Caffe Latte", "White Chocolate Mocha", "Cramel Latte", "Caffe Americano", "Cappuccino", "Espresso Truffle", "Espresso con Panna", "Peppermint Mocha Twist"
            ];

    var priceValues =
            [
                "2.25", "1.5", "3.0", "3.3", "4.5", "3.6", "3.8", "2.5", "5.0", "1.75", "3.25", "4.0"
            ];

    for (var i = 0; i < 10; i++) {
        var row = {};
        var productindex = Math.floor(Math.random() * productNames.length);
        var price = parseFloat(priceValues[productindex]);
        var quantity = 1 + Math.round(Math.random() * 10);

        row["firstname"] = firstNames[Math.floor(Math.random() * firstNames.length)];
        row["lastname"] = lastNames[Math.floor(Math.random() * lastNames.length)];
        row["productname"] = productNames[productindex];
        row["price"] = price;
        row["quantity"] = quantity;
        row["total"] = price * quantity;

        data[i] = row;
    }

    var source =
            {
                localdata: data,
                datatype: "array"
            };

    var dataAdapter = new $.jqx.dataAdapter(source);

    $("#jqxgrid").jqxGrid(
            {
                width: 300,
                source: dataAdapter,
                altrows: true,
                theme: theme,
				sortable: true,
			    autoheight: true,
                columns: [
                  { text: 'First Name', dataField: 'firstname', width: 90 },
                  { text: 'Last Name', dataField: 'lastname', width: 90 },
                  { text: 'Price', cellsformat: 'c2', dataField: 'price', width: 120 }
                  ]
            });
        }
function getTextElementByColor(color) {
    if (color == 'transparent' || color.hex == "") {
        return $("<div style='text-shadow: none; position: relative; padding-bottom: 2px; margin-top: 2px;'>transparent</div>");
    }

    var element = $("<div style='text-shadow: none; position: relative; padding-bottom: 2px; margin-top: 2px;'>#" + color.hex + "</div>");
    var nThreshold = 105;
    var bgDelta = (color.r * 0.299) + (color.g * 0.587) + (color.b * 0.114);
    var foreColor = (255 - bgDelta < nThreshold) ? 'Black' : 'White';
    element.css('color', foreColor);
    element.css('background', "#" + color.hex);
    element.addClass('jqx-rc-all');
    return element;
}
function initDefaultState() {
    // background-color.
    var getTextElementByColor = this.getTextElementByColor;
    $("#backgroundDefault").jqxDropDownButton({ width: 140, height: 22, theme: 'classic' });
    $("#backgroundDefaultColorPicker").jqxColorPicker({ colorMode:'hue', showTransparent: true, width: 210, height: 200, theme: 'classic' });

    // gradients.
    $("#backgroundDefaultGradientCheck").jqxCheckBox();
    $("#backgroundDefaultGradientCheck").bind('change', function (event) {
        $("#backgroundDefaultGrad1").jqxDropDownButton({ disabled: !event.args.checked });
        $("#backgroundDefaultGrad2").jqxDropDownButton({ disabled: !event.args.checked });
    });
    $("#backgroundDefaultColorPicker").bind('colorchange', function (event) {
        $("#backgroundDefault").jqxDropDownButton('setContent', getTextElementByColor(event.args.color));
    });

    $("#backgroundDefaultGrad1").jqxDropDownButton({ disabled: true, width: 140, height: 22, theme: 'classic' });
    $("#backgroundDefaultGrad2").jqxDropDownButton({ disabled: true, width: 140, height: 22, theme: 'classic' });
    $("#backgroundDefaultColorPickerGrad1").jqxColorPicker({ colorMode:'hue', showTransparent: true, width: 210, height: 200, theme: 'classic' });
    $("#backgroundDefaultColorPickerGrad2").jqxColorPicker({ colorMode:'hue', showTransparent: true, width: 210, height: 200, theme: 'classic' });
    $("#backgroundDefaultColorPickerGrad1").bind('colorchange', function (event) {
        $("#backgroundDefaultGrad1").jqxDropDownButton('setContent', getTextElementByColor(event.args.color));
    });
    $("#backgroundDefaultColorPickerGrad2").bind('colorchange', function (event) {
        $("#backgroundDefaultGrad2").jqxDropDownButton('setContent', getTextElementByColor(event.args.color));
    });

    // border.
    $("#borderDefaultDropDownList").jqxDropDownButton({ width: 140, height: 22, theme: 'classic' });
    $("#borderDefaultColorPicker").jqxColorPicker({ colorMode:'hue', showTransparent: true, width: 210, height: 200, theme: 'classic' });
    $("#borderDefaultColorPicker").bind('colorchange', function (event) {
        $("#borderDefaultDropDownList").jqxDropDownButton('setContent', getTextElementByColor(event.args.color));
    });

    // text
    $("#textDefaultDropDownList").jqxDropDownButton({ width: 140, height: 22, theme: 'classic' });
    $("#textDefaultColorPicker").jqxColorPicker({ colorMode:'hue', showTransparent: true, width: 210, height: 200, theme: 'classic' });
    $("#textDefaultColorPicker").bind('colorchange', function (event) {
        $("#textDefaultDropDownList").jqxDropDownButton('setContent', getTextElementByColor(event.args.color));
    });

    // icons
    var source = [
            'light',
            'dark'
        ];
    $("#defaultIconType").jqxDropDownList({ selectedIndex: 1, autoDropDownHeight: true, source: source, width: 140, height: 22, theme: 'classic' });

    // set defaults.
    $("#backgroundDefaultColorPicker").jqxColorPicker('color', new $.jqx.color({ hex: 'efefef' }));
    $("#borderDefaultColorPicker").jqxColorPicker('color', new $.jqx.color({ hex: 'aaaaaaa' }));
    $("#textDefaultColorPicker").jqxColorPicker('color', new $.jqx.color({ hex: '222222' }));
	$("#backgroundDefaultColorPickerGrad1").jqxColorPicker('color', new $.jqx.color({ hex: 'efefef' }));
	$("#backgroundDefaultColorPickerGrad2").jqxColorPicker('color', new $.jqx.color({ hex: 'efefef' }));	
}
function initHoverState() {
    var getTextElementByColor = this.getTextElementByColor;;
    // background-color.
    $("#backgroundHover").jqxDropDownButton({ width: 140, height: 22, theme: 'classic' });
    $("#backgroundHoverColorPicker").jqxColorPicker({ colorMode:'hue', showTransparent: true, width: 210, height: 200, theme: 'classic' });

    // gradients.
    $("#backgroundHoverGradientCheck").jqxCheckBox();
    $("#backgroundHoverGradientCheck").bind('change', function (event) {
        $("#backgroundHoverGrad1").jqxDropDownButton({ disabled: !event.args.checked });
        $("#backgroundHoverGrad2").jqxDropDownButton({ disabled: !event.args.checked });
    });
    $("#backgroundHoverColorPicker").bind('colorchange', function (event) {
        $("#backgroundHover").jqxDropDownButton('setContent', getTextElementByColor(event.args.color));
    });

    $("#backgroundHoverGrad1").jqxDropDownButton({ disabled: true, width: 140, height: 22, theme: 'classic' });
    $("#backgroundHoverGrad2").jqxDropDownButton({ disabled: true, width: 140, height: 22, theme: 'classic' });
    $("#backgroundHoverColorPickerGrad1").jqxColorPicker({ colorMode:'hue', showTransparent: true, width: 210, height: 200, theme: 'classic' });
    $("#backgroundHoverColorPickerGrad2").jqxColorPicker({ colorMode:'hue', showTransparent: true, width: 210, height: 200, theme: 'classic' });
    $("#backgroundHoverColorPickerGrad1").bind('colorchange', function (event) {
        $("#backgroundHoverGrad1").jqxDropDownButton('setContent', getTextElementByColor(event.args.color));
    });
    $("#backgroundHoverColorPickerGrad2").bind('colorchange', function (event) {
        $("#backgroundHoverGrad2").jqxDropDownButton('setContent', getTextElementByColor(event.args.color));
    });

    // border.
    $("#borderHoverDropDownList").jqxDropDownButton({ width: 140, height: 22, theme: 'classic' });
    $("#borderHoverColorPicker").jqxColorPicker({ colorMode:'hue', showTransparent: true, width: 210, height: 200, theme: 'classic' });
    $("#borderHoverColorPicker").bind('colorchange', function (event) {
        $("#borderHoverDropDownList").jqxDropDownButton('setContent', getTextElementByColor(event.args.color));
    });

    // text
    $("#textHoverDropDownList").jqxDropDownButton({ width: 140, height: 22, theme: 'classic' });
    $("#textHoverColorPicker").jqxColorPicker({ colorMode:'hue', showTransparent: true, width: 210, height: 200, theme: 'classic' });
    $("#textHoverColorPicker").bind('colorchange', function (event) {
        $("#textHoverDropDownList").jqxDropDownButton('setContent', getTextElementByColor(event.args.color));
    });

    // icons
    var source = [
            'light',
            'dark'
        ];
    $("#hoverIconType").jqxDropDownList({ selectedIndex: 1, autoDropDownHeight: true, source: source, width: 140, height: 22, theme: 'classic' });

    // set Hovers.
    $("#backgroundHoverColorPicker").jqxColorPicker('color', new $.jqx.color({ hex: 'e8e8e8' }));
    $("#borderHoverColorPicker").jqxColorPicker('color', new $.jqx.color({ hex: 'aaaaaaa' }));
    $("#textHoverColorPicker").jqxColorPicker('color', new $.jqx.color({ hex: '222222' }));
	$("#backgroundHoverColorPickerGrad1").jqxColorPicker('color', new $.jqx.color({ hex: 'e8e8e8' }));
	$("#backgroundHoverColorPickerGrad2").jqxColorPicker('color', new $.jqx.color({ hex: 'e8e8e8' }));	
}
function initActiveState() {
    var getTextElementByColor = this.getTextElementByColor;;
    // background-color.
    $("#backgroundActive").jqxDropDownButton({ width: 140, height: 22, theme: 'classic' });
    $("#backgroundActiveColorPicker").jqxColorPicker({ colorMode:'hue', showTransparent: true, width: 210, height: 200, theme: 'classic' });

    // gradients.
    $("#backgroundActiveGradientCheck").jqxCheckBox();
    $("#backgroundActiveGradientCheck").bind('change', function (event) {
        $("#backgroundActiveGrad1").jqxDropDownButton({ disabled: !event.args.checked });
        $("#backgroundActiveGrad2").jqxDropDownButton({ disabled: !event.args.checked });
    });
    $("#backgroundActiveColorPicker").bind('colorchange', function (event) {
        $("#backgroundActive").jqxDropDownButton('setContent', getTextElementByColor(event.args.color));
    });

    $("#backgroundActiveGrad1").jqxDropDownButton({ disabled: true, width: 140, height: 22, theme: 'classic' });
    $("#backgroundActiveGrad2").jqxDropDownButton({ disabled: true, width: 140, height: 22, theme: 'classic' });
    $("#backgroundActiveColorPickerGrad1").jqxColorPicker({ colorMode:'hue', showTransparent: true, width: 210, height: 200, theme: 'classic' });
    $("#backgroundActiveColorPickerGrad2").jqxColorPicker({ colorMode:'hue', showTransparent: true, width: 210, height: 200, theme: 'classic' });
    $("#backgroundActiveColorPickerGrad1").bind('colorchange', function (event) {
        $("#backgroundActiveGrad1").jqxDropDownButton('setContent', getTextElementByColor(event.args.color));
    });
    $("#backgroundActiveColorPickerGrad2").bind('colorchange', function (event) {
        $("#backgroundActiveGrad2").jqxDropDownButton('setContent', getTextElementByColor(event.args.color));
    });

    // border.
    $("#borderActiveDropDownList").jqxDropDownButton({ width: 140, height: 22, theme: 'classic' });
    $("#borderActiveColorPicker").jqxColorPicker({ colorMode:'hue', showTransparent: true, width: 210, height: 200, theme: 'classic' });
    $("#borderActiveColorPicker").bind('colorchange', function (event) {
        $("#borderActiveDropDownList").jqxDropDownButton('setContent', getTextElementByColor(event.args.color));
    });

    // text
    $("#textActiveDropDownList").jqxDropDownButton({ width: 140, height: 22, theme: 'classic' });
    $("#textActiveColorPicker").jqxColorPicker({ colorMode:'hue', showTransparent: true, width: 210, height: 200, theme: 'classic' });
    $("#textActiveColorPicker").bind('colorchange', function (event) {
        $("#textActiveDropDownList").jqxDropDownButton('setContent', getTextElementByColor(event.args.color));
    });

    // icons
    var source = [
            'light',
            'dark'
        ];
    $("#activeIconType").jqxDropDownList({ selectedIndex: 1, autoDropDownHeight: true, source: source, width: 140, height: 22, theme: 'classic' });

    // set Actives.
    $("#backgroundActiveColorPicker").jqxColorPicker('color', new $.jqx.color({ hex: 'd1d1d1' }));
    $("#borderActiveColorPicker").jqxColorPicker('color', new $.jqx.color({ hex: 'aaaaaaa' }));
    $("#textActiveColorPicker").jqxColorPicker('color', new $.jqx.color({ hex: '222222' }));
	$("#backgroundActiveColorPickerGrad1").jqxColorPicker('color', new $.jqx.color({ hex: 'd1d1d1' }));
	$("#backgroundActiveColorPickerGrad2").jqxColorPicker('color', new $.jqx.color({ hex: 'd1d1d1' }));	
}
function initHeader() {
    var getTextElementByColor = this.getTextElementByColor;;
    // background-color.
    $("#headerBackgroundColor").jqxDropDownButton({ width: 140, height: 22, theme: 'classic' });
    $("#headerBackgroundColorPicker").jqxColorPicker({ colorMode:'hue', showTransparent: true, width: 210, height: 200, theme: 'classic' });

    // gradients.
    $("#headerCheckBoxGradient").jqxCheckBox();
    $("#headerCheckBoxGradient").bind('change', function (event) {
        $("#headerGradientColor1").jqxDropDownButton({ disabled: !event.args.checked });
        $("#headerGradientColor2").jqxDropDownButton({ disabled: !event.args.checked });
    });
    $("#headerBackgroundColorPicker").bind('colorchange', function (event) {
        $("#headerBackgroundColor").jqxDropDownButton('setContent', getTextElementByColor(event.args.color));
    });

    $("#headerGradientColor1").jqxDropDownButton({ disabled: true, width: 140, height: 22, theme: 'classic' });
    $("#headerGradientColor2").jqxDropDownButton({ disabled: true, width: 140, height: 22, theme: 'classic' });
    $("#headerGradientColorPicker1").jqxColorPicker({ colorMode:'hue', showTransparent: true, width: 210, height: 200, theme: 'classic' });
    $("#headerGradientColorPicker2").jqxColorPicker({ colorMode:'hue', showTransparent: true, width: 210, height: 200, theme: 'classic' });
    $("#headerGradientColorPicker1").bind('colorchange', function (event) {
        $("#headerGradientColor1").jqxDropDownButton('setContent', getTextElementByColor(event.args.color));
    });
    $("#headerGradientColorPicker2").bind('colorchange', function (event) {
        $("#headerGradientColor2").jqxDropDownButton('setContent', getTextElementByColor(event.args.color));
    });

    // border.
    $("#headerBorderColor").jqxDropDownButton({ width: 140, height: 22, theme: 'classic' });
    $("#headerBorderColorPicker").jqxColorPicker({ colorMode:'hue', showTransparent: true, width: 210, height: 200, theme: 'classic' });
    $("#headerBorderColorPicker").bind('colorchange', function (event) {
        $("#headerBorderColor").jqxDropDownButton('setContent', getTextElementByColor(event.args.color));
    });

    // text
    $("#headerTextColor").jqxDropDownButton({ width: 140, height: 22, theme: 'classic' });
    $("#headerTextColorPicker").jqxColorPicker({ colorMode:'hue', showTransparent: true, width: 210, height: 200, theme: 'classic' });
    $("#headerTextColorPicker").bind('colorchange', function (event) {
        $("#headerTextColor").jqxDropDownButton('setContent', getTextElementByColor(event.args.color));
    });

    // set defaults.
    $("#headerBackgroundColorPicker").jqxColorPicker('color', new $.jqx.color({ hex: 'efefef' }));
    $("#headerBorderColorPicker").jqxColorPicker('color', new $.jqx.color({ hex: 'aaaaaaa' }));
    $("#headerTextColorPicker").jqxColorPicker('color', new $.jqx.color({ hex: '222222' }));
	$("#headerGradientColorPicker1").jqxColorPicker('color', new $.jqx.color({ hex: 'efefef' }));
	$("#headerGradientColorPicker2").jqxColorPicker('color', new $.jqx.color({ hex: 'efefef' }));	
    // End Header
}
function initContent() {
    var getTextElementByColor = this.getTextElementByColor;;
    // background-color.
    $("#contentBackgroundColor").jqxDropDownButton({ width: 140, height: 22, theme: 'classic' });
    $("#contentBackgroundColorPicker").jqxColorPicker({ colorMode:'hue', showTransparent: true, width: 210, height: 200, theme: 'classic' });
    $("#contentBackgroundColorPicker").bind('colorchange', function (event) {
        $("#contentBackgroundColor").jqxDropDownButton('setContent', getTextElementByColor(event.args.color));
    });

    // border.
    $("#contentBorderColor").jqxDropDownButton({ width: 140, height: 22, theme: 'classic' });
    $("#contentBorderColorPicker").jqxColorPicker({ colorMode:'hue', showTransparent: true, width: 210, height: 200, theme: 'classic' });
    $("#contentBorderColorPicker").bind('colorchange', function (event) {
        $("#contentBorderColor").jqxDropDownButton('setContent', getTextElementByColor(event.args.color));
    });

    // text
    $("#contentTextColor").jqxDropDownButton({ width: 140, height: 22, theme: 'classic' });
    $("#contentTextColorPicker").jqxColorPicker({ colorMode:'hue', showTransparent: true, width: 210, height: 200, theme: 'classic' });
    $("#contentTextColorPicker").bind('colorchange', function (event) {
        $("#contentTextColor").jqxDropDownButton('setContent', getTextElementByColor(event.args.color));
    });

    // set defaults.
    $("#contentBackgroundColorPicker").jqxColorPicker('color', new $.jqx.color({ hex: 'ffffff' }));
    $("#contentBorderColorPicker").jqxColorPicker('color', new $.jqx.color({ hex: 'aaaaaaa' }));
    $("#contentTextColorPicker").jqxColorPicker('color', new $.jqx.color({ hex: '222222' }));
    // End Content
}
function initMisc() {
    var getTextElementByColor = this.getTextElementByColor;;
    // background-color.
    $("#miscBackgroundColor").jqxDropDownButton({ width: 85, height: 22, theme: 'classic' });
    $("#miscBackgroundColorPicker").jqxColorPicker({ colorMode:'hue', showTransparent: true, width: 210, height: 200, theme: 'classic' });
    $("#miscBackgroundColor2").jqxDropDownButton({ width: 85, height: 22, theme: 'classic' });
    $("#miscBackgroundColorPicker2").jqxColorPicker({ colorMode:'hue', showTransparent: true, width: 210, height: 200, theme: 'classic' });
    $("#miscBackgroundColor3").jqxDropDownButton({ width: 85, height: 22, theme: 'classic' });
    $("#miscBackgroundColorPicker3").jqxColorPicker({ colorMode:'hue', showTransparent: true, width: 210, height: 200, theme: 'classic' });
    $("#miscBackgroundColor4").jqxDropDownButton({ width: 85, height: 22, theme: 'classic' });
    $("#miscBackgroundColorPicker4").jqxColorPicker({ colorMode:'hue', showTransparent: true, width: 210, height: 200, theme: 'classic' });
    $("#miscBackgroundColor5").jqxDropDownButton({ width: 85, height: 22, theme: 'classic' });
    $("#miscBackgroundColorPicker5").jqxColorPicker({ colorMode:'hue', showTransparent: true, width: 210, height: 200, theme: 'classic' });
    $("#miscBackgroundColor6").jqxDropDownButton({ width: 85, height: 22, theme: 'classic' });
    $("#miscBackgroundColorPicker6").jqxColorPicker({ colorMode:'hue', showTransparent: true, width: 210, height: 200, theme: 'classic' });
    $("#miscBackgroundColor7").jqxDropDownButton({ width: 85, height: 22, theme: 'classic' });
    $("#miscBackgroundColorPicker7").jqxColorPicker({ colorMode:'hue', showTransparent: true, width: 210, height: 200, theme: 'classic' });
    $("#miscBackgroundColor8").jqxDropDownButton({ width: 85, height: 22, theme: 'classic' });
    $("#miscBackgroundColorPicker8").jqxColorPicker({ colorMode:'hue', showTransparent: true, width: 210, height: 200, theme: 'classic' });
    $("#miscBackgroundColor9").jqxDropDownButton({ width: 85, height: 22, theme: 'classic' });
    $("#miscBackgroundColorPicker9").jqxColorPicker({ colorMode:'hue', showTransparent: true, width: 210, height: 200, theme: 'classic' });
    $("#miscBackgroundColor10").jqxDropDownButton({ width: 85, height: 22, theme: 'classic' });
    $("#miscBackgroundColorPicker10").jqxColorPicker({ colorMode:'hue', showTransparent: true, width: 210, height: 200, theme: 'classic' });
    $("#miscBackgroundColor11").jqxDropDownButton({ width: 85, height: 22, theme: 'classic' });
    $("#miscBackgroundColorPicker11").jqxColorPicker({ colorMode:'hue', showTransparent: true, width: 210, height: 200, theme: 'classic' });

    $("#miscBackgroundColorPicker").bind('colorchange', function (event) {
        $("#miscBackgroundColor").jqxDropDownButton('setContent', getTextElementByColor(event.args.color));
    });
    $("#miscBackgroundColorPicker2").bind('colorchange', function (event) {
        $("#miscBackgroundColor2").jqxDropDownButton('setContent', getTextElementByColor(event.args.color));
    });
    $("#miscBackgroundColorPicker3").bind('colorchange', function (event) {
        $("#miscBackgroundColor3").jqxDropDownButton('setContent', getTextElementByColor(event.args.color));
    });
    $("#miscBackgroundColorPicker4").bind('colorchange', function (event) {
        $("#miscBackgroundColor4").jqxDropDownButton('setContent', getTextElementByColor(event.args.color));
    });
    $("#miscBackgroundColorPicker5").bind('colorchange', function (event) {
        $("#miscBackgroundColor5").jqxDropDownButton('setContent', getTextElementByColor(event.args.color));
    });
	    $("#miscBackgroundColorPicker6").bind('colorchange', function (event) {
        $("#miscBackgroundColor6").jqxDropDownButton('setContent', getTextElementByColor(event.args.color));
    });
    $("#miscBackgroundColorPicker7").bind('colorchange', function (event) {
        $("#miscBackgroundColor7").jqxDropDownButton('setContent', getTextElementByColor(event.args.color));
    });
    $("#miscBackgroundColorPicker8").bind('colorchange', function (event) {
        $("#miscBackgroundColor8").jqxDropDownButton('setContent', getTextElementByColor(event.args.color));
    });
    $("#miscBackgroundColorPicker9").bind('colorchange', function (event) {
        $("#miscBackgroundColor9").jqxDropDownButton('setContent', getTextElementByColor(event.args.color));
    });
    $("#miscBackgroundColorPicker10").bind('colorchange', function (event) {
        $("#miscBackgroundColor10").jqxDropDownButton('setContent', getTextElementByColor(event.args.color));
    });   
	$("#miscBackgroundColorPicker11").bind('colorchange', function (event) {
        $("#miscBackgroundColor11").jqxDropDownButton('setContent', getTextElementByColor(event.args.color));
    });
	
	
    // set defaults.
    $("#miscBackgroundColorPicker").jqxColorPicker('color', new $.jqx.color({ hex: 'efefef' }));
    $("#miscBackgroundColorPicker2").jqxColorPicker('color', new $.jqx.color({ hex: 'efefef' }));
    $("#miscBackgroundColorPicker3").jqxColorPicker('color', new $.jqx.color({ hex: 'efefef' }));
    $("#miscBackgroundColorPicker4").jqxColorPicker('color', new $.jqx.color({ hex: 'efefef' }));
    $("#miscBackgroundColorPicker5").jqxColorPicker('color', new $.jqx.color({ hex: 'aaaaaa' }));
	$("#miscBackgroundColorPicker6").jqxColorPicker('color', new $.jqx.color({ hex: '888888' }));
    $("#miscBackgroundColorPicker7").jqxColorPicker('color', new $.jqx.color({ hex: '000000' }));
	$("#miscBackgroundColorPicker8").jqxColorPicker('color', new $.jqx.color({ hex: 'efefef' }));
	$("#miscBackgroundColorPicker9").jqxColorPicker('color', new $.jqx.color({ hex: '000000' }));
	$("#miscBackgroundColorPicker10").jqxColorPicker('color', new $.jqx.color({ hex: '000000' }));
	$("#miscBackgroundColorPicker11").jqxColorPicker('color', new $.jqx.color({ hex: 'd1d1d1' }));

   // End Content
}
function setTheme(oldTheme, theme, element) {
    if (typeof element === 'undefined') {
        return;
    }
    var classNames = element[0].className.split(' '),
        oldClasses = [], newClasses = [],
        children = element.children();
    for (var i = 0; i < classNames.length; i += 1) {
        if (classNames[i].indexOf(oldTheme) >= 0) {
            if (oldTheme.length > 0) {
                oldClasses.push(classNames[i]);
                newClasses.push(classNames[i].replace(oldTheme, theme));
            }
            else {
                newClasses.push(classNames[i] + '-' + theme);
            }
        }
    }
    this._removeOldClasses(oldClasses, element);
    this._addNewClasses(newClasses, element);
    for (var i = 0; i < children.length; i += 1) {
        this.setTheme(oldTheme, theme, $(children[i]));
    }
}
function _removeOldClasses(classes, element) {
    for (var i = 0; i < classes.length; i += 1) {
        element.removeClass(classes[i]);
    }
}
function _addNewClasses(classes, element) {
    for (var i = 0; i < classes.length; i += 1) {
        element.addClass(classes[i]);
    }
}
function setThemes(oldTheme, theme) {
    setTheme(oldTheme, theme, $("#jqxmenu"));
    setTheme(oldTheme, theme, $("#jqxtabs"));
    setTheme(oldTheme, theme, $("#jqxnavigationbar"));
    setTheme(oldTheme, theme, $("#jqxcalendar"));
    setTheme(oldTheme, theme, $("#jqxlistbox"));
    setTheme(oldTheme, theme, $("#jqxdropdownlist"));
    setTheme(oldTheme, theme, $("#jqxcombobox"));
    setTheme(oldTheme, theme, $("#jqxdatetimeinput"));
    setTheme(oldTheme, theme, $("#jqxmaskedinput"));
    setTheme(oldTheme, theme, $("#jqxnumberinput"));
    setTheme(oldTheme, theme, $("#jqxbutton"));
    setTheme(oldTheme, theme, $("#jqxlinkbutton"));
    setTheme(oldTheme, theme, $("#jqxcheckbox"));
    setTheme(oldTheme, theme, $("#jqxradiobutton"));
    setTheme(oldTheme, theme, $("#jqxradiobutton2"));
    setTheme(oldTheme, theme, $("#jqxprogressbar"));
    setTheme(oldTheme, theme, $("#jqxslider"));
    setTheme(oldTheme, theme, $("#jqxsplitter"));
    setTheme(oldTheme, theme, $("#jqxtree"));
    setTheme(oldTheme, theme, $("#jqxsplitter"));
    setTheme(oldTheme, theme, $("#jqxdocking"));
    setTheme(oldTheme, theme, $("#jqxpanel"));
}
function getGradientCode(backgroundFromColor, backgroundToColor)
{
	var cssString = "";
	cssString = cssString + '  background-image: -moz-linear-gradient(top, ' + backgroundFromColor + ', ' + backgroundToColor + ');\n';
	cssString = cssString + '  background-image: -ms-linear-gradient(top, ' + backgroundFromColor + ', ' + backgroundToColor + ');\n';
	cssString = cssString + '  background-image: -o-linear-gradient(top, ' + backgroundFromColor + ', ' + backgroundToColor + ');\n';
	cssString = cssString + '  background-image: -webkit-gradient(linear, center top, center bottom, from(' + backgroundFromColor + '), to(' + backgroundToColor + '));\n';
	cssString = cssString + '  background-image: -webkit-linear-gradient(top, ' + backgroundFromColor + ', ' + backgroundToColor + ');\n';
	cssString = cssString + '  background-image: linear-gradient(top, ' + backgroundFromColor + ', ' + backgroundToColor + ');\n';
	cssString += '  -moz-background-clip: padding;\n';
	cssString += '  background-clip: padding-box;\n';
	cssString += '  -webkit-background-clip: padding-box;\n';
	return cssString;
}
function getLTRGradientCode(backgroundFromColor, backgroundToColor)
{
	var cssString = "";
	
	cssString = cssString + '  background-image: -moz-linear-gradient(left, ' + backgroundFromColor + ', ' + backgroundToColor + ');\n';
	cssString = cssString + '  background-image: -ms-linear-gradient(left, ' + backgroundFromColor + ', ' + backgroundToColor + ');\n';
	cssString = cssString + '  background-image: -o-linear-gradient(left, ' + backgroundFromColor + ', ' + backgroundToColor + ');\n';
	cssString = cssString + '  background-image: -webkit-gradient(linear, left top, right top, from(' + backgroundFromColor + '), to(' + backgroundToColor + '));\n';
	cssString = cssString + '  background-image: -webkit-linear-gradient(left, ' + backgroundFromColor + ', ' + backgroundToColor + ');\n';
	cssString = cssString + '  background-image: linear-gradient(left, ' + backgroundFromColor + ', ' + backgroundToColor + ');\n';
	return cssString;
}
function getLTRGradientByBrowser(browser, backgroundFromColor, backgroundToColor)
{
	if (browser == 'mozilla')
	{
		return '-moz-linear-gradient(left, ' + backgroundFromColor + ', ' + backgroundToColor + ')';
	}
	else if (browser == 'opera')
	{
		return 	'-o-linear-gradient(left, ' + backgroundFromColor + ', ' + backgroundToColor + ')';
	}
	else if (browser == 'chrome')
	{
		return '-webkit-gradient(linear, left top, right top, from(' + backgroundFromColor + '), to(' + backgroundToColor + '))';
	}
	else	
	{
		return 'linear-gradient(left, ' + backgroundFromColor + ', ' + backgroundToColor + ')';
	}
}
function getGradientByBrowser(browser, backgroundFromColor, backgroundToColor)
{
	if (browser == 'mozilla')
	{
		return '-moz-linear-gradient(top, ' + backgroundFromColor + ', ' + backgroundToColor + ')';
	}
	else if (browser == 'opera')
	{
		return 	'-o-linear-gradient(top, ' + backgroundFromColor + ', ' + backgroundToColor + ')';
	}
	else if (browser == 'chrome')
	{
		return '-webkit-gradient(linear, center top, center bottom, from(' + backgroundFromColor + '), to(' + backgroundToColor + '))';
	}
	else	
	{
		return 'linear-gradient(top, ' + backgroundFromColor + ', ' + backgroundToColor + ')';
	}
}
function getBackgroundColorCode(backgroundColor) {
	var cssString = "";
	cssString += "  background-color: " + backgroundColor + ";\n";
	return cssString;
}
function getBackgroundCode(backgroundColor) {
	var cssString = "";
	cssString += "  background: " + backgroundColor + ";\n";
	return cssString;
}
function getBorderColorCode(borderColor)
{
	var cssString = "";
	cssString += "  border-color: " + borderColor + ";\n";
	return cssString;
}
function getTextColorCode(textColor)
{
	var cssString = "";
	cssString += "  color: " + textColor + ";\n";
	return cssString;
}
function getFontFamilyCode(fontFamily)
{
	var cssString = "";
	cssString += "  font-family: " + fontFamily + ";\n";
	return cssString;
}
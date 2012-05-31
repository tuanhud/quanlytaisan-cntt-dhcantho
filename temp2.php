<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>

<style type="text/css">
#desc {
    margin-bottom: 20px;
    border-bottom: 1px dotted #333;
}
#desc span {
    background: #a3350d;
    padding :2px;
    color:# f27243;
}

.yui3-panel {
    outline: none;
}
.yui3-panel-content .yui3-widget-hd {
    font-weight: bold;
}
.yui3-panel-content .yui3-widget-bd {
    padding: 15px;
}
.yui3-panel-content label {
    margin-right: 30px;
}
.yui3-panel-content fieldset {
    border: none;
    padding: 0;
}
.yui3-panel-content input[type="text"] {
    border: none;
    border: 1px solid #ccc;
    padding: 3px 7px;
    -webkit-border-radius: 2px;
    -moz-border-radius: 2px;
    border-radius: 2px;
    font-size: 100%;
    width: 200px;
}

#addRow {
    margin-top: 10px;
}

#dt {
    margin-left: 1em;
}

#dt th, #dt td {
    border: 0 none;
    border-left: 1px solid #cbcbcb;
}

</style>

</head>

<body>

<h2>Using a panel to show a modal form</h2>

<div class="yui3-u-1">

<div id="dt"></div>

<p><button id="addRow">Add</button></p>

<div id="panelContent">
    <div class="yui3-widget-bd">
        <form>
            <fieldset>
                <p>
                    <label for="id">ID</label><br/>
                    <input type="text" name="id" id="productId" placeholder="">
                </p>
                <p>
                    <label for="name">Name</label><br/>
                    <input type="text" name="name" id="name" value="" placeholder="">
                </p>
                <p>
                    <label for="password">Price</label><br/>
                    <input type="text" name="price" id="price" value="" placeholder="$">
                </p>
            </fieldset>
        </form>
    </div>
</div>

<div id="nestedPanel"></div>

<p>
Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur non felis
dolor. Fusce rutrum velit quis sem luctus ultrices. Vivamus bibendum mollis
enim, vel auctor massa convallis accumsan. Curabitur laoreet nunc vel leo
laoreet sed feugiat elit tempor. Sed fermentum ligula ut nisi lobortis pretium.
Donec ut est at leo rhoncus ultricies eu at nunc. Phasellus semper, lacus ac
pulvinar dictum, orci orci iaculis nulla, non condimentum nibh justo eu felis.
Nam sed orci a ligula vehicula rutrum. Donec sodales euismod laoreet. Mauris ut
augue purus. Nulla porta vehicula ligula, id viverra lacus hendrerit ut. Donec
eu est vitae orci ullamcorper pellentesque. Morbi molestie placerat aliquet.
Aliquam aliquet consectetur porttitor. Mauris semper tincidunt nisi, in
dignissim turpis auctor ac. Sed at enim ligula. Aenean quis dignissim augue.
</p>

<p>
Nunc quis sem tortor. Quisque lorem quam, auctor sit amet porttitor pretium,
accumsan quis arcu. Mauris blandit, enim nec fermentum faucibus, massa lectus
posuere massa, eget consequat leo risus in risus. Sed ornare euismod orci sit
amet commodo. Suspendisse ultrices dui ut mi venenatis vitae tincidunt dolor
pulvinar. Proin at nibh sed libero molestie facilisis. Maecenas magna purus,
lacinia eu tempus in, elementum a est. Morbi eget magna sed justo dignissim
pulvinar nec vitae justo. Aliquam tincidunt arcu eget orci tempus ornare
ullamcorper dolor aliquet. Vestibulum congue posuere porttitor. Pellentesque
magna erat, dapibus nec tristique at, posuere sed nisl. In pretium, risus at
volutpat pretium, augue nunc commodo metus, vitae ullamcorper risus quam
sagittis turpis. Proin eget cursus quam. Sed elit tortor, tempus pharetra
lacinia vel, ultrices nec est. Praesent nibh risus, vulputate nec tincidunt
eget, lacinia sed eros. Vestibulum vel velit massa. In hac habitasse platea
dictumst. Etiam eu magna ligula.
</p>

<p>
Vivamus vel dui at velit laoreet accumsan. Pellentesque posuere est et urna
euismod elementum. Fusce a nibh nisl, vitae iaculis magna. Nulla sit amet odio
in elit posuere pellentesque. Nulla sit amet eros eu odio tempus feugiat at vel
purus. In vehicula feugiat purus eu ultricies. Aliquam vitae sapien quis augue
gravida pretium. Morbi non lectus eu nisi varius mollis. Maecenas eget nisl sit
amet turpis cursus gravida at quis odio. Cras viverra eros placerat erat
ultricies ultricies.
</p>

<p>
Aenean malesuada erat vel ipsum iaculis sollicitudin. Class aptent taciti
sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos.
Sed lectus metus, accumsan in molestie vitae, luctus non nibh. Vestibulum
rutrum, nulla vel tristique varius, metus nibh tincidunt erat, at mattis turpis
justo quis velit. Donec ac lobortis mauris. Nam nulla tellus, placerat sit amet
tempus non, consequat sed nibh. Curabitur eget ligula a sem dictum fringilla.
Cras fermentum blandit nulla ut vulputate. Nullam iaculis venenatis orci, et
tincidunt lorem pellentesque eget. Morbi sit amet nibh id sapien rhoncus mollis.
Vestibulum quis neque massa, eget interdum dolor. Donec rhoncus, metus non
dignissim imperdiet, nulla orci eleifend sapien, at interdum augue lacus ac
quam. Duis ullamcorper, augue eget semper varius, mi nisi rutrum mi, non
sagittis neque quam nec ipsum. Curabitur in mauris lacus. Ut porta porttitor
nunc, id elementum quam mattis quis. Donec quis libero eros, at malesuada
lectus. Cras lectus tellus, pharetra ut tempor ut, fringilla in turpis.
</p>

<p>
Quisque tempor turpis non ligula ornare cursus. Vivamus tempus lobortis urna sed
vestibulum. Duis id ligula eu dolor feugiat laoreet sit amet in enim. Integer
ullamcorper erat at sem mattis quis tempor metus ullamcorper. Praesent sed diam
elit. Donec vel lorem libero. Suspendisse nec arcu ac purus interdum mollis
congue imperdiet erat. Suspendisse eu tristique enim. Quisque volutpat, leo sit
amet iaculis luctus, velit neque suscipit nisi, vitae placerat felis diam
laoreet metus. Suspendisse consectetur pulvinar commodo. Nulla magna quam,
scelerisque blandit pellentesque sed, euismod nec nulla. Curabitur vitae est
quis sem condimentum dictum. Aenean tincidunt dolor ac orci consectetur id
pulvinar justo aliquam. Proin ante nulla, ullamcorper sit amet auctor in,
pulvinar volutpat quam. Sed vitae dolor dui, sed tincidunt nunc. Phasellus
euismod consequat fringilla. Quisque semper dolor eget tellus sagittis porta sit
amet quis libero.
</p>

</div>

<script type="text/javascript" src="Admin/js/yui/yui-min.js"></script>
<script type="text/javascript">

YUI().use('datatable-mutable', 'panel', 'dd-plugin', function (Y) {

    // Create the datatable with some gadget information.
    var idField    = Y.one('#productId'),
        nameField  = Y.one('#name'),
        priceField = Y.one('#price'),
        addRowBtn  = Y.one('#addRow'),

        cols = ['id', 'name', 'price'],
        data = [
            {id:'ga-3475', name:'gadget', price:'$6.99'},
            {id:'sp-9980', name:'sprocket', price:'$3.75'},
            {id:'wi-0650', name:'widget', price:'$4.25'}
        ],

        dt, panel, nestedPanel;

    // Define the addItem function - this will be called when 'Add Item' is
    // pressed on the modal form.
    function addItem() {
        dt.addRow({
            id   : idField.get('value'),
            name : nameField.get('value'),
            price: priceField.get('value')
        });

        idField.set('value', '');
        nameField.set('value', '');
        priceField.set('value', '');

        panel.hide();
    }

    // Define the removeItems function - this will be called when
    // 'Remove All Items' is pressed on the modal form and is confirmed 'yes'
    // by the nested panel.
    function removeItems() {
        dt.data.reset();
        panel.hide();
    }

    // Instantiate the nested panel if it doesn't exist, otherwise just show it.
    function removeAllItemsConfirm() {
        if (nestedPanel) {
            return nestedPanel.show();
        }

        nestedPanel = new Y.Panel({
            bodyContent: 'Are you sure you want to remove all items?',
            width      : 400,
            zIndex     : 6,
            centered   : true,
            modal      : true,
            render     : '#nestedPanel',
            buttons: [
                {
                    value  : 'Yes',
                    section: Y.WidgetStdMod.FOOTER,
                    action : function (e) {
                        e.preventDefault();
                        nestedPanel.hide();
                        panel.hide();
                        removeItems();
                    }
                },
                {
                    value  : 'No',
                    section: Y.WidgetStdMod.FOOTER,
                    action : function (e) {
                        e.preventDefault();
                        nestedPanel.hide();
                    }
                }
            ]
        });
    }

    // Create the DataTable.
    dt = new Y.DataTable({
        columns: cols,
        data   : data,
        summary: 'Price sheet for inventory parts',
        caption: 'Price sheet for inventory parts',
        render : '#dt'
    });

    // Create the main modal form.
    panel = new Y.Panel({
        srcNode      : '#panelContent',
        headerContent: 'Add A New Product',
        width        : 250,
        zIndex       : 5,
        centered     : true,
        modal        : true,
        visible      : false,
        render       : true,
        plugins      : [Y.Plugin.Drag]
    });

    panel.addButton({
        value  : 'Add Item',
        section: Y.WidgetStdMod.FOOTER,
        action : function (e) {
            e.preventDefault();
            addItem();
        }
    });

    panel.addButton({
        value  : 'Remove All Items',
        section: Y.WidgetStdMod.FOOTER,
        action : function (e) {
            e.preventDefault();
            removeAllItemsConfirm();
        }
    });

    // When the addRowBtn is pressed, show the modal form.
    addRowBtn.on('click', function (e) {
        panel.show();
    });

});

</script>
</body>
</html>
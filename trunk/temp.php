<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<style type="text/css">
.yui3-skin-sam .yui3-datatable-col-select {
    text-align: center;
}

#processed {
   margin-top: 2em;
   border: 2px inset;
   border-radius: 5px;
   padding: 1em;
   list-style: none;
}
</style>
<script type="text/javascript" src="js/yui.js"></script>
<script type="text/javascript" src="js/jquery-1.3.1.min.js"></script>
<script type="text/javascript">
YUI({ filter: 'raw' }).use( "datatable-sort", "datatable-scroll", "cssbutton", function (Y) {

    var ports = [
        { port:20,  pname:'FTP_data',ptitle:'File Transfer Process Data' },
        { port:21,  pname:'FTP',     ptitle:'File Transfer Process' },
        { port:22,  pname:'SSH',     ptitle:'Secure Shell' },
        { port:23,  pname:'TELNET',  ptitle:'Telnet remote communications' },
        { port:25,  pname:'SMTP',    ptitle:'Simple Mail Transfer Protocol' },
        { port:43,  pname:'WHOIS',   ptitle:'whois Identification' },
        { port:53,  pname:'DNS',     ptitle:'Domain Name Service' },
        { port:68,  pname:'DHCP',    ptitle:'Dynamic Host Control Protocol' },
        { port:79,  pname:'FINGER',  ptitle:'Finger Identification' },
        { port:80,  pname:'HTTP',    ptitle:'HyperText Transfer Protocol' },
        { port:110, pname:'POP3',   ptitle:'Post Office Protocol v3' },
        { port:115, pname:'SFTP',   ptitle:'Secure File Transfer Protocol' },
        { port:119, pname:'NNTP',   ptitle:'Network New Transfer Protocol' },
        { port:123, pname:'NTP',    ptitle:'Network Time Protocol' },
        { port:139, pname:'NetBIOS',ptitle:'NetBIOS Communication' },
        { port:143, pname:'IMAP',   ptitle:'Internet Message Access Protocol' },
        { port:161, pname:'SNMP',   ptitle:'Simple Network Management Protocol' },
        { port:194, pname:'IRC',    ptitle:'Internet Relay Chat' },
        { port:220, pname:'IMAP3',  ptitle:'Internet Message Access Protocol v3' },
        { port:389, pname:'LDAP',   ptitle:'Lightweight Directory Access Protocol' },
        { port:443, pname:'SSL',    ptitle:'Secure Socket Layer' },
        { port:445, pname:'SMB',    ptitle:'NetBIOS over TCP' },
        { port:993, pname:'SIMAP',  ptitle:'Secure IMAP Mail' },
        { port:995, pname:'SPOP',   ptitle:'Secure POP Mail' }
    ];

    var table = new Y.DataTable({
        columns : [
            {   key:        'select',
                allowHTML:  true, // to avoid HTML escaping
                label:      '<input type="checkbox" class="protocol-select-all" title="Toggle ALL records"/>',
                formatter:      '<input type="checkbox" checked/>',
                emptyCellValue: '<input type="checkbox"/>'
            },
            {   key: 'port',   label: 'Port No.' },
            {   key: 'pname',  label: 'Protocol' },
            {   key: 'ptitle', label: 'Common Name' }
        ],
        data      : ports,
        scrollable: 'y',
        height    : '250px',
        sortable  : ['port','pname'],
        recordType: ['select', 'port', 'pname', 'ptitle']
    }).render("#dtable");
    table.detach('*:change');
    table.delegate("click", function(e){
        // undefined to trigger the emptyCellValue
        var checked = e.target.get('checked') || undefined;

        this.getRecord(e.target).set('select', checked);

        // Uncheck the header checkbox
        this.get('contentBox')
            .one('.protocol-select-all').set('checked', false);
    }, ".yui3-datatable-data .yui3-datatable-col-select input", table);



    table.delegate('click', function (e) {
      
        var checked = e.target.get('checked') || undefined;
        this.data.invoke('set', 'select', checked, { silent: true });

        // Update the table now that all records have been updated
        this.syncUI();
    }, '.protocol-select-all', table);

    function process() {
        var ml  = table.data,
            msg = '',
            template ='<li hidden="true">Record index = {index} Data = {port} : {pname}</li>';

        ml.each(function (item, i) {
            var data = item.getAttrs(['select', 'port', 'pname']);
            if (data.select) 
			{
              data.index = i;
              msg += Y.Lang.sub(template, data);
            }
        });

        Y.one("#processed").setHTML(msg || '<li>(None)</li>');
    }

    Y.one("#btnSelected").on("click", process);

    Y.one("#btnClearSelected").on("click",function () {
        table.data.invoke('set', 'select', undefined);

        // Uncheck the header checkbox
        table.get('contentBox')
            .one('.protocol-select-all').set('checked', false);

        process();
    });

});

</script>
</head>

<body>
<div class="example yui3-skin-sam">
    <div id="dtable"></div>
    <button id="btnSelected" class="yui3-button">Process Selections</button>
    <button id="btnClearSelected" class="yui3-button">Clear Selections</button>

    <h4>Processed:</h4>
    <ul id="processed">
        <li>(None)</li>
    </ul>
</div>
</body>
</html>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta name="keywords" content="jQuery Menu, Main Menu, Context Menu, Vertical Menu, Popup Menu, Menu, jqxMenu" />
    <meta name="description" content="The jqxMenu widget makes it easy to add menus to your website or web application. With the jqxMenu you can create website menus, customized context menus, or application-style menu bars with just a small amount of scripting." />
    <title id='Description'>In this demo is illustrated how to add images to the Menu items.
    </title>
    <link rel="stylesheet" href="../jqwidgets/styles/jqx.base.css" type="text/css" />
    <script type="text/javascript" src="../scripts/gettheme.js"></script>
    <script type="text/javascript" src="../scripts/jquery-1.7.2.min.js"></script>
    <script type="text/javascript" src="../jqwidgets/jqxcore.js"></script>
    <script type="text/javascript" src="../jqwidgets/jqxmenu.js"></script>
    <script type="text/javascript" src="../jqwidgets/jqxcheckbox.js"></script>
    <script type="text/javascript" src="../jqwidgets/jqxradiobutton.js"></script>
</head>
<body>
    <div id='content'>
        <script type="text/javascript">
            $(document).ready(function () {
                var theme = getTheme();
                // Create a jqxMenu
                $("#jqxMenu").jqxMenu({ width: '150px', height: '220px', mode: 'vertical', theme: theme });
                $("#jqxMenu").css('visibility', 'visible');
                // create checkboxes
                $("#checkbox").jqxCheckBox({ checked: true, theme: theme });
                $("#checkbox2").jqxCheckBox({ theme: theme });
                $("#checkbox3").jqxCheckBox({ theme: theme });
            });
        </script>
        <div id='jqxWidget' style='height: 300px;'>
            <div id='jqxMenu' style="visibility: hidden;">
                <ul>
                    <li>
                        <img style='float: left; margin-right: 5px;' src='../images/add.png' /><span>Mail</span>
                    </li>
                    <li>
                        <img style='float: left; margin-right: 5px;' src='../images/calendarIcon.png' /><span>Calendar</span>
                    </li>
                    <li>
                        <img style='float: left; margin-right: 5px;' src='../images/contactsIcon.png' /><span>Contacts</span>
                    </li>
                    <li>
                        <img style='float: left; margin-right: 5px;' src='../images/folder.png' /><span>
                            <span>Inbox</span></span>
                        <ul>
                            <li>
                                <img style='float: left; margin-right: 5px;' src='../images/folder.png' /><span>jQWidgets</span>
                                <ul>
                                    <li>
                                        <img style='float: left; margin-right: 5px;' src='../images/folder.png' /><span>Admin</span>
                                    </li>
                                    <li>
                                        <img style='float: left; margin-right: 5px;' src='../images/folder.png' /><span>Corporate</span>
                                    </li>
                                    <li>
                                        <img style='float: left; margin-right: 5px;' src='../images/folder.png' /><span>Finance</span>
                                    </li>
                                    <li>
                                        <img style='float: left; margin-right: 5px;' src='../images/folder.png' /><span>Other</span>
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <img style='float: left; margin-right: 5px;' src='../images/folder.png' /><span>Personal</span>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <img style='float: left; margin-right: 5px;' src='../images/recycle.png' />
                        <span>Deleted Items</span>
                        <ul>
                            <li>
                                <img style='float: left; margin-right: 5px;' src='../images/folder.png' /><span>Today</span>
                            </li>
                            <li>
                                <img style='float: left; margin-right: 5px;' src='../../images/folder.png' /><span>Last
                                    Week</span> </li>
                            <li>
                                <img style='float: left; margin-right: 5px;' src='../../images/folder.png' /><span>Last
                                    Month</span> </li>
                        </ul>
                    </li>
                    <li>
                        <img style='float: left; margin-right: 5px;' src='../../images/settings.png' /><span>Settings</span>
                        <ul style="width: 230px;">
                            <li>
                                <div style='float: left; margin-right: 5px;' id='checkbox'>
                                </div>
                                Enable Auto-Save</li>
                            <li>
                                <div style='float: left; margin-right: 5px;' id='checkbox2'>
                                </div>
                                Send email as anonymous</li>
                            <li>
                                <div style='float: left; margin-right: 5px;' id='checkbox3'>
                                </div>
                                Save sent emails</li>
                        </ul>
                    </li>
                    <li>
                        <img style='float: left; margin-right: 5px;' src='../../images/notesIcon.png' /><span>Notes</span>
                    </li>
                    <li>
                        <img style='float: left; margin-right: 5px;' src='../../images/favorites.png' /><span>Favorites</span>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</body>
</html>
/*
 * File: app/view/MainViewport.js
 *
 * This file was generated by Sencha Architect version 3.0.3.
 * http://www.sencha.com/products/architect/
 *
 * This file requires use of the Ext JS 4.2.x library, under independent license.
 * License of Sencha Architect does not include license for Ext JS 4.2.x. For more
 * details see http://www.sencha.com/license or contact license@sencha.com.
 *
 * This file will be auto-generated each and everytime you save your project.
 *
 * Do NOT hand edit this file.
 */

Ext.define('PlanezSphere.view.MainViewport', {
    extend: 'Ext.container.Viewport',

    requires: [
        'Ext.form.FieldSet',
        'Ext.form.field.Text',
        'Ext.form.field.Checkbox',
        'Ext.button.Button'
    ],

    layout: 'border',

    initComponent: function() {
        var me = this;

        Ext.applyIf(me, {
            items: [
                {
                    xtype: 'container',
                    region: 'north',
                    height: 150,
                    layout: {
                        type: 'hbox',
                        align: 'stretch'
                    },
                    items: [
                        {
                            xtype: 'container',
                            flex: 1
                        },
                        {
                            xtype: 'container',
                            flex: 6,
                            cls: 'planezsphere',
                            height: 150,
                            layout: {
                                type: 'hbox',
                                align: 'stretch',
                                pack: 'center'
                            }
                        },
                        {
                            xtype: 'container',
                            flex: 1
                        }
                    ]
                },
                {
                    xtype: 'container',
                    region: 'center',
                    id: 'masterCardLayout',
                    itemId: 'masterCardLayout',
                    layout: 'card',
                    items: [
                        {
                            xtype: 'container',
                            itemId: 'loginCard',
                            layout: {
                                type: 'hbox',
                                align: 'stretch'
                            },
                            items: [
                                {
                                    xtype: 'container',
                                    flex: 1,
                                    html: '<div class="leftColumn">\n    <img src="_images/M42.png" class="img" alt="M42" height="150" width="200" />\n    <img src="_images/M81.png" class="img" alt="M81" height="150" width="200" />\n    <img src="_images/M82.png" class="img" alt="M82" height="150" width="200" />\n</div>'
                                },
                                {
                                    xtype: 'container',
                                    flex: 1,
                                    items: [
                                        {
                                            xtype: 'container',
                                            minHeight: 200
                                        },
                                        {
                                            xtype: 'fieldset',
                                            border: 0,
                                            itemId: 'txtusername',
                                            padding: 10,
                                            title: 'Login',
                                            items: [
                                                {
                                                    xtype: 'textfield',
                                                    anchor: '100%',
                                                    itemId: 'txtusername',
                                                    fieldLabel: 'Username',
                                                    labelAlign: 'right',
                                                    listeners: {
                                                        afterrender: {
                                                            fn: me.onTxtusernameAfterRender,
                                                            scope: me
                                                        }
                                                    }
                                                },
                                                {
                                                    xtype: 'textfield',
                                                    anchor: '100%',
                                                    itemId: 'txtpassword',
                                                    fieldLabel: 'Password',
                                                    labelAlign: 'right',
                                                    inputType: 'password'
                                                },
                                                {
                                                    xtype: 'container',
                                                    layout: {
                                                        type: 'vbox',
                                                        align: 'center',
                                                        pack: 'end'
                                                    },
                                                    items: [
                                                        {
                                                            xtype: 'checkboxfield',
                                                            flex: 1,
                                                            boxLabel: 'Remember Me',
                                                            boxLabelAlign: 'before'
                                                        }
                                                    ]
                                                },
                                                {
                                                    xtype: 'container',
                                                    layout: {
                                                        type: 'vbox',
                                                        align: 'center',
                                                        pack: 'center'
                                                    },
                                                    items: [
                                                        {
                                                            xtype: 'button',
                                                            flex: 1,
                                                            itemId: 'btnlogin',
                                                            margin: 10,
                                                            text: 'Login'
                                                        },
                                                        {
                                                            xtype: 'button',
                                                            flex: 1,
                                                            cls: 'loginButton',
                                                            itemId: 'btnForgotPassword',
                                                            margin: 5,
                                                            style: 'background-color:transparent;',
                                                            text: ' I forgot my Password'
                                                        }
                                                    ]
                                                }
                                            ]
                                        }
                                    ]
                                },
                                {
                                    xtype: 'container',
                                    flex: 1,
                                    html: '<div class="rightColumn">\n    <img src="_images/rosette1.png" class="img" alt="Rosette Nebula" height="150" width="200" />\n    <img src="_images/moon.png" class="img" alt="Moon" height="150" width="200" />\n    <img src="_images/rig.jpg" class="img" alt="My rig" height="150" width="200" />\n</div>'
                                }
                            ]
                        },
                        {
                            xtype: 'container',
                            hidden: true,
                            html: '<div class="saturn">\n    <a href="/~mikebedingfield/Orion_Project/index.php" target="_blank"><img src="_images/saturn2.jpg" alt="saturn" height="150" width="150" id="picSaturn" /></a>\n</div>\n<div class="earth">\n    <a href="#" target="_blank"><img src="_images/earth.jpeg" alt="earth" height="150" width="150" /></a>\n</div>\n<div class="jupiter">\n    <a href="#" target="_blank"><img src="_images/jupiter.jpg" alt="jupiter" height="150" width="150" /></a>\n</div>\n<div class="mars">\n    <a href="#" target="_blank"><img src="_images/mars.jpeg" alt="mars" height="150" width="150" /></a>\n</div>',
                            id: 'modules',
                            itemId: 'modules',
                            padding: 20
                        }
                    ]
                }
            ]
        });

        me.callParent(arguments);
    },

    onTxtusernameAfterRender: function(component, eOpts) {
        component.focus();
    }

});
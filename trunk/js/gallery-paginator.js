YUI.add('gallery-querybuilder', function(Y) {

"use strict";

var has_bubble_problem = (0 < Y.UA.ie && Y.UA.ie < 9);

/**********************************************************************
 * <p>Class which allows user to build a list of query criteria, e.g., for
 * searching.  All the conditions are either AND'ed or OR'ed.  For a more
 * general query builder, see gallery-exprbuilder.</p>
 *
 * <p>The default package provides two data types:  String (which can also
 * be used for numbers) and Select (which provides a menu of options).  The
 * plugin API allows defining additional data types, e.g., date range or
 * multi-select.  Every plugin must be registered in
 * <code>Y.QueryBuilder.plugin_mapping</code>.  Plugins must implement the
 * following functions:</p>
 *
 * <dl>
 * <dt><code>constructor(qb, config)</code></dt>
 * <dd>The arguments passed to the constructor are the QueryBuilder instance
 *		and the <code>pluginConfig</code> set on the QueryBuilder instance.
 *		At the minimum, this function should initalize form field name patterns
 *		using <code>config.field_prefix</code>.</dd>
 * <dt><code>create(query_index, var_config, op_list, value)</code><dt>
 * <dd>This function must create the additional cells for the query row and
 *		populate these cells appropriately.  (The QueryBuilder widget will
 *		insert the cells into the table.)  <code>var_config</code> is the
 *		item from the QueryBuilder's <code>var_list</code> that the user
 *		selected.  <code>op_list</code> is the item from the QueryBuilder's
 *		<code>operators</code> which matches the variable selected by the
 *		user.  <code>value</code> is optional.  If specified, it is the
 *		initial value(s) to be displayed by the plugin.</dd>
 * <dt><code>postCreate(query_index, var_config, op_list, value)</code></dt>
 * <dd>Optional.  If it exists, it will be called after the cells returned by
 *		<code>create()</code> have been inserted into the table.  The arguments
 *		are the same as <code>create()</code>.</dd>
 * <dt><code>destroy()</code></dt>
 * <dd>Destroy the plugin.  (The QueryBuilder widget will remove the cells
 *		and purge all events.)</dd>
 * <dt><code>updateName(new_index)</code></dt>
 * <dd>Update the names of the form fields managed by the plugin.</dd>
 * <dt><code>set(query_index, data)</code></dt>
 * <dd>Set the displayed value(s) by extracting values from data (a map)
 *		based on the current names of the plugin's form fields.</dd>
 * <dt><code>toDatabaseQuery()</code></dt>
 * <dd>Return an array of arrays.  Each inner array contains an operation
 *		and a value.  The default String and Select plugins each return
 *		a single inner array.  A date range plugin would return two inner
 *		arrays, one for the start date and one for the end date.</dd>
 * </dl>
 *
 * @module gallery-querybuilder
 * @class QueryBuilder
 * @constructor
 * @param var_list {Array} List of variables that be included in the query.
 *		Each item in the list is an object containing:
 *		<dl>
 *		<dt>name</dt>
 *		<dd>The name of the variable.  Set as the <code>value</code> for the select option.</dd>
 *		<dt>type</dt>
 *		<dd>The variable type.  Used to determine which plugin to instantiate.
 *			Must match a key in <code>Y.QueryBuilder.plugin_mapping</code>.
 *			(You can add new plugins to this global mapping.)</dd>
 *		<dt>text</dt>
 *		<dd>The text displayed when the variable is selected.</dd>
 *		<dt>plugin-specific configuration</dt>
 *		<dd>Plugins may defines additional configuration.</dd>
 *		</dl>
 * @param operators {Object} Map of variable types to list of operators.
 *		Each operator is an object defining <code>value</code> and <code>text</code>.
 * @param config {Object} Widget configuration
 */

function QueryBuilder(
	/* array */		var_list,
	/* object */	operators,
	/* object */	config)
{
	if (arguments.length === 0)	// derived class prototype
	{
		return;
	}

	if (!Y.FormManager)
	{
		Y.FormManager =
		{
			row_marker_class:    '',
			status_marker_class: '',
			required_class:      ''
		};
	}

	// list of variables that can be queried

	this.var_list = var_list.slice(0);

	// list of possible query operations for each data type

	this.op_list      = Y.clone(operators, true);
	this.op_list.none = [];

	// table rows containing the query elements

	this.row_list = [];

	QueryBuilder.superclass.constructor.call(this, config);
}

QueryBuilder.NAME = "querybuilder";

QueryBuilder.ATTRS =
{
	/**
	 * The prompt displayed when a new item is added to the query.
	 *
	 * @config chooseVarPrompt
	 * @type {String}
	 * @default "Choose a variable"
	 * @writeonce
	 */
	chooseVarPrompt:
	{
		value:     '-Lọc theo-',
		validator: Y.Lang.isString,
		writeOnce: true
	},

	/**
	 * All generated form field names start with this prefix.  This avoids
	 * conflicts if you have more than one QueryBuilder on a page.
	 *
	 * @config fieldPrefix
	 * @type {String}
	 * @default ""
	 * @writeonce
	 */
	fieldPrefix:
	{
		value:     '',
		validator: Y.Lang.isString,
		writeOnce: true
	},

	/**
	 * Configuration passed to plugins when they are constructed.
	 *
	 * @config pluginConfig
	 * @type {Object}
	 * @default {}
	 * @writeonce
	 */
	pluginConfig:
	{
		value:     {},
		validator: Y.Lang.isObject,
		writeOnce: true
	}
};

/**
 * @event queryChanged
 * @description Fires when the query is modified.
 * @param info {Object} <code>remove</code> is <code>true</code> if a row was removed
 */

function initVarList()
{
	this.var_list.unshift(
	{
		name: 'yui3-querybuilder-choose-prompt',
		type: 'none',
		text: this.get('chooseVarPrompt')
	});
}

function findRow(
	/* array */		row_list,
	/* element */	query_row)
{
	var count = row_list.length;
	for (var i=0; i<count; i++)
	{
		if (row_list[i].row == query_row)
		{
			return i;
		}
	}

	return -1;
}

function insertRow(
	/* event */		e,
	/* element */	query_row)
{
	this.appendNew();
}

function removeRow(
	/* event */		e,
	/* element */	query_row)
{
	var i = findRow(this.row_list, query_row);
	if (i >= 0)
	{
		this.remove(i);
	}
}

function changeVar(
	/* event */		e,
	/* element */	query_row)
{
	var i = findRow(this.row_list, query_row);
	if (i >= 0)
	{
		this.update(i);
	}
}

function keyUp(e)
{
	if (e.keyCode != 13)
	{
		this._notifyChanged();
	}
}

Y.extend(QueryBuilder, Y.Widget,
{
	initializer: function(config)
	{
		var field_prefix                      = this.get('fieldPrefix');
		this.var_menu_name_pattern            = field_prefix + 'query_var_{i}';
		this.get('pluginConfig').field_prefix = field_prefix;
		this.plugin_column_count              = 0;	// expands as needed

		initVarList.call(this);
	},

	renderUI: function()
	{
		var container = this.get('contentBox');
		container.on('change', this._notifyChanged, this);
		container.on('keyup', keyUp, this);

		this.table = Y.Node.create('<table></table>');
		container.appendChild(this.table);

		this.appendNew();
	},

	destructor: function()
	{
		for (var i=0; i<this.row_list.length; i++)
		{
			if (this.row_list[i].plugin)
			{
				this.row_list[i].plugin.destroy();
			}
		}

		this.row_list = null;
		this.table    = null;
	},

	/**
	 * Reset the query.
	 *
	 * @param var_list {Array} If specified, the list of available variables is replaced.
	 * @param operators {Object} If specified, the operators for all variable types will be replaced.
	 */
	reset: function(
		/* array */		var_list,
		/* object */	operators)
	{
		this._allow_remove_last_row = true;

		for (var i=this.row_list.length-1; i>=0; i--)
		{
			this.remove(i);
		}

		this._allow_remove_last_row = false;

		if (var_list)
		{
			this.var_list = var_list.slice(0);
			initVarList.call(this);
		}

		if (operators)
		{
			this.op_list      = Y.clone(operators, true);
			this.op_list.none = [];
		}

		this.appendNew();
	},

	/**
	 * Append a new query condition to the table.
	 *
	 * @param name {String} If specified, this variable is selected.
	 * @param value {String} If specified, this value is selected.
	 * @return {Object} plugin that was created for the row, if any
	 */
	appendNew: function(
		/* string */	name,
		/* string */	value)
	{
		// if has single, neutral row, use it

		if (name && this.row_list.length == 1)
		{
			var var_menu = this.row_list[0].var_menu;
			if (var_menu.get('selectedIndex') === 0)
			{
				for (var i=0; i<this.var_list.length; i++)
				{
					if (this.var_list[i].name == name)
					{
						var_menu.set('selectedIndex', i);
						break;
					}
				}

				this.update(0, value);
				return this.row_list[0].plugin;
			}
		}

		// create new row

		var new_index  = this.row_list.length;
		var query_body = Y.Node.create('<tbody></tbody>');
		query_body.set('className', Y.FormManager.row_marker_class);

		// error row

		var error_row = Y.Node.create('<tr></tr>');
		error_row.set('className', this.getClassName('error'));
		query_body.appendChild(error_row);

		var error_cell = this._createContainer();
		error_cell.set('colSpan', 1 + this.plugin_column_count);
		error_cell.set('innerHTML', '<p class="' + Y.FormManager.status_marker_class + '"></p>');
		error_row.appendChild(error_cell);

		error_row.appendChild(this._createContainer());

		// criterion row

		var query_row = Y.Node.create('<tr></tr>');
		query_row.set('className', this.getClassName('criterion'));
		query_body.appendChild(query_row);

		// cell for query variable menu

		var var_cell = this._createContainer();
		var_cell.set('className', this.getClassName('variable'));
		query_row.appendChild(var_cell);

		// menu for selecting query variable

		var_cell.set('innerHTML', this._variablesMenu(this.variableName(new_index)));

		var var_menu = var_cell.one('select');
		var_menu.on('change', changeVar, this, query_row);

		var options = Y.Node.getDOMNode(var_menu).options;
		for (var i=0; i<this.var_list.length; i++)
		{
			options[i] = new Option(this.var_list[i].text, this.var_list[i].name);
			if (this.var_list[i].name == name)
			{
				var_menu.set('selectedIndex', i);
			}
		}

		if (has_bubble_problem)
		{
			var_menu.on('change', this._notifyChanged, this);
		}

		// controls for this row

		var control_cell = this._createContainer();
		control_cell.set('className', this.getClassName('controls'));
		control_cell.set('innerHTML', this._rowControls());
		query_row.appendChild(control_cell);

		var insert_control = control_cell.one('.'+this.getClassName('insert'));
		if (insert_control)
		{
			insert_control.on('click', insertRow, this, query_row);
		}

		var remove_control = control_cell.one('.'+this.getClassName('remove'));
		if (remove_control)
		{
			remove_control.on('click', removeRow, this, query_row);
		}

		// insert into DOM after fully constructed

		this.table.appendChild(query_body);

		var obj =
		{
			body:     query_body,
			row:      query_row,
			var_menu: var_menu,
			control:  control_cell,
			error:    error_cell
		};
		this.row_list.push(obj);
		this.update(new_index, value);

		query_body.scrollIntoView();

		return this.row_list[new_index].plugin;
	},

	/**
	 * Set the value of the specified row.
	 *
	 * @param row_index {int} The index of the row
	 * @param value {String} If specified, the value to set
	 */
	update: function(
		/* int */		row_index,
		/* string */	value)
	{
		var query_row    = this.row_list[row_index].row;
		var control_cell = this.row_list[row_index].control;

		// clear error

		this.row_list[row_index].error.one('.'+Y.FormManager.status_marker_class).set('innerHTML', '');

		// remove all but the first cell (variable name) and last cell (controls)

		if (this.row_list[row_index].plugin)
		{
			this.row_list[row_index].plugin.destroy();
			this.row_list[row_index].plugin = null;
		}

		while (query_row.get('children').size() > 2)
		{
			var child = query_row.get('children').item(0).next();
			child.remove(true);
		}

		// re-build the table row

		var var_menu     = this.row_list[row_index].var_menu;
		var selected_var = this.var_list[ var_menu.get('selectedIndex') ];

		var cells = [];
		if (selected_var.type != 'none')
		{
			this.row_list[row_index].plugin =
				new QueryBuilder.plugin_mapping[ selected_var.type ](
					this, this.get('pluginConfig'));
			cells =
				this.row_list[row_index].plugin.create(
					row_index, selected_var,
					this.op_list[ selected_var.type ], value);
		}

		while (cells.length < this.plugin_column_count)
		{
			cells.push(this._createContainer());
		}

		for (var i=0; i<cells.length; i++)
		{
			query_row.insertBefore(cells[i], control_cell);
		}

		if (cells.length > this.plugin_column_count)
		{
			var col_span = 1 + cells.length;
			for (var i=0; i<this.row_list.length; i++)
			{
				var row = this.row_list[i].row;
				this.row_list[i].error.set('colSpan', col_span);

				if (row != query_row)
				{
					var control = this.row_list[i].control;

					for (var j=this.plugin_column_count; j<cells.length; j++)
					{
						row.insertBefore(this._createContainer(), control);
					}
				}
			}

			this.plugin_column_count = cells.length;
		}

		var plugin = this.row_list[row_index].plugin;
		if (plugin && Y.Lang.isFunction(plugin.postCreate))
		{
			this.row_list[row_index].plugin.postCreate(
				row_index, selected_var,
				this.op_list[ selected_var.type ], value);
		}
	},

	/**
	 * Removes the specified row.
	 *
	 * @param row_index {int} The index of the row
	 * @return {boolean} <code>true</code> if successful
	 */
	remove: function(
		/* int */	row_index)
	{
		// sanity checks

		if (this.row_list.length <= 0)
		{
			return false;
		}

		// last row cannot be removed

		if (!this._allow_remove_last_row && this.row_list.length == 1)
		{
			var var_menu = this.row_list[0].var_menu;
			var_menu.set('selectedIndex', 0);
			this.update(0);
			this.fire('queryChanged', {remove: true});
			return true;
		}

		var query_body = this.row_list[row_index].body;
		if (query_body === null)
		{
			return false;
		}

		// remove row

		if (this.row_list[row_index].plugin)
		{
			this.row_list[row_index].plugin.destroy();
		}

		query_body.remove(true);
		this.row_list.splice(row_index, 1);

		// renumber remaining rows

		for (var i=0; i<this.row_list.length; i++)
		{
			var var_menu = this.row_list[i].var_menu;
			var_menu.setAttribute('name', this.variableName(i));

			var selected_var = this.var_list[ var_menu.get('selectedIndex') ];
			if (selected_var.type != 'none')
			{
				this.row_list[i].plugin.updateName(i);
			}
		}

		this.fire('queryChanged', {remove: true});
		return true;
	},

	/**
	 * Returns plugin used for the specified row, if any.
	 *
	 * @param row_index {int} The index of the row
	 * @return {Object} the plugin for the row, if any
	 */
	getPlugin: function(
		/* int */	row_index)
	{
		return this.row_list[row_index].plugin;
	},

	/**
	 * @return {Array} list of [var, op, value] tuples suitable for a database query
	 */
	toDatabaseQuery: function()
	{
		var result = [];

		for (var i=0; i<this.row_list.length; i++)
		{
			var row    = this.row_list[i];
			var plugin = row.plugin;
			if (plugin)
			{
				var list = plugin.toDatabaseQuery();
				for (var j=0; j<list.length; j++)
				{
					result.push([ row.var_menu.get('value') ].concat(list[j]));
				}
			}
		}

		return result;
	},

	/*
	 * API for plugins
	 */

	/**
	 * @protected
	 * @return {DOM element} container for one piece of a query row
	 */
	_createContainer: function()
	{
		return Y.Node.create('<td></td>');
	},

	/**
	 * Fires the queryChanged event.
	 *
	 * @protected
	 */
	_notifyChanged: function()
	{
		this.fire('queryChanged');
	},

	/*
	 * Form element names.
	 */

	/**
	 * @param i {int} query row index
	 * @return {String} name for the select form element listing the available query variables
	 */
	variableName: function(
		/* int */	i)
	{
		return Y.Lang.substitute(this.var_menu_name_pattern, {i:i});
	},

	//
	// Markup
	//

	/**
	 * @protected
	 * @param menu_name {String} name for the select form element
	 * @return {String} markup for the query variable menu
	 */
	_variablesMenu: function(
		/* string */	menu_name)
	{
		// This must use a select tag!

		var markup = '<select name="{n}" class="formmgr-field {c}" />';

		return Y.Lang.substitute(markup,
		{
			n: menu_name,
			c: this.getClassName('field')
		});
	},

	/**
	 * @protected
	 * @return {String} markup for the row controls (insert and remove)
	 */
	_rowControls: function()
	{
		var markup =
			'<span class="{ci}"></span>' +
			'<span class="{cr}"></span>';

		if (!this._controls_markup)
		{
			this._controls_markup = Y.Lang.substitute(markup,
			{
				ci: this.getClassName('insert'),
				cr: this.getClassName('remove')
			});
		}

		return this._controls_markup;
	}
});

Y.QueryBuilder = QueryBuilder;
/**********************************************************************
 * <p>Plugin for accepting a string or number.  All the operators specified
 * for this plugin are displayed on a menu.</p>
 * 
 * <p>In the <code>var_list</code> configuration, specify
 * <code>validation</code> to provide CSS classes that will be interpreted
 * by <code>Y.FormManager</code>.</p>
 * 
 * <p>To enable autocomplete, define <code>autocomplete</code> in the
 * <code>var_list</code> configuration.  The object will be used as the
 * configuration for <code>Y.Plugin.AutoComplete</code>.  If you specify
 * <code>autocomplete.containerClassName</code>, this CSS class will be
 * added to the container generated by the autocomplete plugin.</p>
 * 
 * @module gallery-querybuilder
 * @class QueryBuilder.String
 * @constructor
 */

QueryBuilder.String = function(
	/* object */	query_builder,
	/* object */	config)
{
	this.qb = query_builder;

	this.op_menu_name_pattern   = config.field_prefix + 'query_op_{i}';
	this.val_input_name_pattern = config.field_prefix + 'query_val_{i}';
};

QueryBuilder.String.prototype =
{
	create: function(
		/* int */		query_index,
		/* object */	var_config,
		/* array */		op_list,
		/* array */		value)
	{
		var op_cell = this.qb._createContainer();
		op_cell.set('className', this.qb.getClassName('operator'));
		op_cell.set('innerHTML', this._operationsMenu(this.operationName(query_index)));
		this.op_menu = op_cell.one('select');

		var options = Y.Node.getDOMNode(this.op_menu).options;
		for (var i=0; i<op_list.length; i++)
		{
			options[i] = new Option(op_list[i].text, op_list[i].value);
		}

		value = value || ['',''];
		if (value[0])
		{
			this.op_menu.set('value', value[0]);
		}

		if (has_bubble_problem)
		{
			this.op_menu.on('change', this.qb._notifyChanged, this.qb);
		}

		var value_cell = this.qb._createContainer();
		value_cell.set('className', this.qb.getClassName('value'));
		value_cell.set('innerHTML', this._valueInput(this.valueName(query_index), var_config.validation));
		this.value_input = value_cell.one('input');
		this.value_input.set('value', value[1]);	// avoid formatting

		return [ op_cell, value_cell ];
	},

	postCreate: function(
		/* int */		filter_index,
		/* object */	var_config,
		/* array */		op_list,
		/* array */		value)
	{
		Y.Lang.later(1, this, function()	// hack for IE7
		{
			if (this.value_input)		// could be destroyed
			{
				if (var_config.autocomplete)
				{
					var config    = Y.clone(var_config.autocomplete);
					config.render = Y.one('body');
					this.value_input.plug(Y.Plugin.AutoComplete, config);

					if (var_config.autocomplete.containerClassName)
					{
						this.value_input.ac.get('boundingBox').addClass(var_config.autocomplete.containerClassName);
					}
				}

				try
				{
					this.value_input.focus();
				}
				catch (e)
				{
					// IE will complain if field is invisible, instead of just ignoring it
				}
			}
		});
	},

	destroy: function()
	{
		if (this.value_input.unplug)
		{
			this.value_input.unplug(Y.Plugin.AutoComplete);
		}

		this.op_menu     = null;
		this.value_input = null;
	},

	updateName: function(
		/* int */	new_index)
	{
		this.op_menu.setAttribute('name', this.operationName(new_index));
		this.value_input.setAttribute('name', this.valueName(new_index));
	},

	set: function(
		/* int */	query_index,
		/* map */	data)
	{
		this.op_menu.set('value', data[ this.operationName(query_index) ]);
		this.value_input.set('value', data[ this.valueName(query_index) ]);
	},

	toDatabaseQuery: function()
	{
		return [ [ this.op_menu.get('value'), this.value_input.get('value') ] ];
	},

	/**********************************************************************
	 * Form element names.
	 */

	operationName: function(
		/* int */	i)
	{
		return Y.Lang.substitute(this.op_menu_name_pattern, {i:i});
	},

	valueName: function(
		/* int */	i)
	{
		return Y.Lang.substitute(this.val_input_name_pattern, {i:i});
	},

	//
	// Markup
	//

	_operationsMenu: function(
		/* string */	menu_name)
	{
		// This must use a select tag!

		var markup = '<select name="{n}" class="formmgr-field {c}" />';

		return Y.Lang.substitute(markup,
		{
			n: menu_name,
			c: this.qb.getClassName('field')
		});
	},

	_valueInput: function(
		/* string */	input_name,
		/* string */	validation_class)
	{
		// This must use an input tag!

		var markup = '<input type="text" name="{n}" class="yiv-required formmgr-field {c}"/>';

		return Y.Lang.substitute(markup,
		{
			n: input_name,
			c: validation_class + ' ' + this.qb.getClassName('field')
		});
	}
};
/**********************************************************************
 * <p>Plugin for choosing from a list of values.  In the
 * <code>var_list</code> configuration, specify <code>value_list</code> as
 * a list of objects, each defining <code>value</code> and
 * <code>text</code>.</p>
 * 
 * <p>There must be exactly one operator specified for this plugin.</p>
 * 
 * @module gallery-querybuilder
 * @class QueryBuilder.Select
 * @constructor
 */

QueryBuilder.Select = function(
	/* object */	query_builder,
	/* object */	config)
{
	this.qb = query_builder;

	this.val_input_name_pattern = config.field_prefix + 'query_val_{i}';
};

QueryBuilder.Select.prototype =
{
	create: function(
		/* int */		query_index,
		/* object */	var_config,
		/* array */		op_list,
		/* string */	value)
	{
		var value_cell = this.qb._createContainer();
		value_cell.set('className', this.qb.getClassName('value'));
		value_cell.set('innerHTML', this._valuesMenu(this.valueName(query_index)));
		this.value_menu = value_cell.one('select');

		var options    = Y.Node.getDOMNode(this.value_menu).options;
		var value_list = var_config.value_list;
		for (var i=0; i<value_list.length; i++)
		{
			options[i] = new Option(value_list[i].text, value_list[i].value);
		}

		if (value)
		{
			this.value_menu.set('value', value);
		}

		if (has_bubble_problem)
		{
			this.value_menu.on('change', this.qb._notifyChanged, this.qb);
		}

		this.db_query_equals = op_list[0];

		return [ value_cell ];
	},

	postCreate: function(
		/* int */		filter_index,
		/* object */	var_config,
		/* array */		op_list,
		/* array */		value)
	{
		try
		{
			this.value_menu.focus();
		}
		catch (e)
		{
			// IE will complain if field is invisible, instead of just ignoring it
		}
	},

	destroy: function()
	{
		this.value_menu = null;
	},

	updateName: function(
		/* int */	new_index)
	{
		this.value_menu.setAttribute('name', this.valueName(new_index));
	},

	set: function(
		/* int */	query_index,
		/* map */	data)
	{
		this.value_menu.set('value', data[ this.valueName(query_index) ]);
	},

	toDatabaseQuery: function()
	{
		return [ [ this.db_query_equals, this.value_menu.get('value') ] ];
	},

	/**********************************************************************
	 * Form element names.
	 */

	valueName: function(
		/* int */	i)
	{
		return Y.Lang.substitute(this.val_input_name_pattern, {i:i});
	},

	//
	// Markup
	//

	_valuesMenu: function(
		/* string */	menu_name)
	{
		// This must use a select tag!

		var markup = '<select name="{n}" class="formmgr-field {c}" />';

		return Y.Lang.substitute(markup,
		{
			n: menu_name,
			c: this.qb.getClassName('field')
		});
	}
};
// global mapping of variable types to plugin classes
// (always introduce new variable types rather than changing the existing mappings)

QueryBuilder.plugin_mapping =
{
	string: QueryBuilder.String,
	number: QueryBuilder.String,
	select: QueryBuilder.Select
};


}, 'gallery-2011.04.13-22-38' ,{skinnable:true, optional:['gallery-formmgr','gallery-scrollintoview','autocomplete'], requires:['widget','substitute']});
YUI.add('gallery-formmgr', function(Y) {

"use strict";

/**********************************************************************
 * <p>FormManager provides support for initializing a form, pre-validating
 * user input, and displaying messages returned by the server.</p>
 * 
 * <p>Also see the documentation for gallery-formmgr-css-validation.</p>
 * 
 * <p><strong>Required Markup Structure</strong></p>
 * 
 * <p>Each element (or tighly coupled set of elements) must be contained by
 * an element that has the CSS class <code>formmgr-row</code>.  Within each
 * row, validation messages are displayed inside the container with CSS
 * class <code>formmgr-message-text</code>.
 * 
 * <p>When a message is displayed inside a row, the CSS class
 * <code>formmgr-has{type}</code> is placed on the row container and the
 * containing fieldset (if any), where <code>{type}</code> is the message
 * type passed to <code>displayMessage()</code>.</p>
 * 
 * <p><strong>Initializing the Form</strong></p>
 * 
 * <p>Default values can be either encoded in the markup or passed to the
 * FormManager constructor via <code>config.default_value_map</code>.  (The
 * former method is obviously better for progressive enhancement.)  The
 * values passed to the constructor override the values encoded in the
 * markup.</p>
 * 
 * <p><code>prepareForm()</code> must be called before the form is
 * displayed.  To initialize focus to the first element in a form, call
 * <code>initFocus()</code>.  If the form is in an overlay, you can delay
 * these calls until just before showing the overlay.</p>
 * 
 * <p>The default values passed to the constructor are inserted by
 * <code>populateForm()</code>.  (This is automatically called by
 * <code>prepareForm()</code>.)</p>
 * 
 * <p><strong>Displaying Messages</strong></p>
 * 
 * <p>To display a message for a single form row, call
 * <code>displayMessage()</code>.  To display a message for the form in
 * general, call <code>displayFormMessage()</code>.  These functions can be
 * used for initializing the error display when the page loads, for
 * displaying the results of pre-validation, and for displaying the results
 * of submitting a form via XHR.</p>
 *
 * <p><strong>Specifying Validations</strong></p>
 *
 * <p>The following classes can be applied to a form element for
 * pre-validation:</p>
 *
 *	<dl>
 *	<dt><code>yiv-required</code></dt>
 *		<dd>Value must not be empty.</dd>
 *
 *	<dt><code>yiv-length:[x,y]</code></dt>
 *		<dd>String must be at least x characters and at most y characters.
 *		At least one of x and y must be specified.</dd>
 *
 *	<dt><code>yiv-integer:[x,y]</code></dt>
 *		<dd>The integer value must be at least x and at most y.
 *		x and y are both optional.</dd>
 *
 *	<dt><code>yiv-decimal:[x,y]</code></dt>
 *		<dd>The decimal value must be at least x and at most y.  Exponents are
 *		not allowed.  x and y are both optional.</dd>
 *	</dl>
 *
 * <p>If we ever need to allow exponents, we can use yiv-float.</p>
 *
 * <p>The following functions allow additional pre-validation to be
 * attached to individual form elements:</p>
 *
 * <dl>
 * <dt><code>setRegex()</code></dt>
 *		<dd>Sets the regular expression that must match in order for the value
 *		to be acceptable.</dd>
 *
 * <dt><code>setFunction()</code></dt>
 *		<dd>Sets the function that must return true in order for the value to
 *		be acceptable.  The function is called in the scope of the Form
 *		object with the arguments:  the form and the element.</dd>
 * </dl>
 *
 * <p><code>setErrorMessages()</code> specifies the error message to be
 * displayed when a pre-validation check fails.</p>
 *
 * <p>Functions are expected to call <code>displayMessage()</code>
 * directly.</p>
 *
 * <p>More complex pre-validations can be added by overriding
 * <code>postValidateForm()</code>, described below.</p>
 *
 * <p>Derived classes may also override the following functions:</p>
 *
 * <dl>
 * <dt><code>prePrepareForm</code>(arguments passed to prepareForm)</dt>
 *		<dd>Called before filling in default values for the form elements.
 *		Return false to cancel dialog.</dd>
 *
 * <dt><code>postPrepareForm</code>(arguments passed to prepareForm)</dt>
 *		<dd>Called after filling in default values for the form elements.</dd>
 *
 * <dt><code>postValidateForm</code>(form)</dt>
 *		<dd>Called after performing the basic pre-validations.  Returns
 *		true if the form contents are acceptable.  Reports error if there
 *		is a problem.</dd>
 * </dl>
 *
 * @module gallery-formmgr
 * @class FormManager
 * @constructor
 * @param form_name {String} The name attribute of the HTML form.
 * @param config {Object} Configuration.
 *		<code>status_node</code> is an optional element in which to display
 *		overall status.  <code>default_value_map</code> is an optional
 *		mapping of form element names to default values.  Default values
 *		encoded in the markup will be merged into this map, but values
 *		passed to the constructor will take precedence.
 */

function FormManager(
	/* string */	form_name,
	/* object */	config)		// {status_node, default_value_map}
{
	if (arguments.length === 0)	// derived class prototype
	{
		return;
	}

	if (!config)
	{
		config = {};
	}

	this.form_name   = form_name;
	this.status_node = Y.one(config.status_node);
	this.enabled     = true;

	// default values for form elements

	this.default_value_map = config.default_value_map;

	// pre-validation methods

	this.validation =
	{
		fn:    {},	// function for validating each element id
		regex: {}	// regex for validating each element id
	};

	// error messages

	this.validation_msgs = {};		// message list, keyed on type, for each element id

	this.has_messages = false;
	this.has_errors   = false;

	// buttons -- disabled during submission

	this.button_list      = [];
	this.user_button_list = [];

	// file uploading is nasty

	this.has_file_inputs = false;
}

// CSS class pattern bookends

var class_re_prefix = '(?:^|\\s)(?:';
var class_re_suffix = ')(?:\\s|$)';

/**
 * The CSS class which marks each row of the form.  Typically, each field
 * (or a very tightly coupled set of fields) is placed in a separate row.
 * 
 * @property Y.FormManager.row_marker_class
 * @type {String}
 */
FormManager.row_marker_class = 'formmgr-row';

/**
 * The CSS class which marks each field in a row of the form.  This enables
 * messaging when multiple fields are in a single row.
 * 
 * @property Y.FormManager.field_marker_class
 * @type {String}
 */
FormManager.field_marker_class = 'formmgr-field';

/**
 * The CSS class which marks the container for the status message within a
 * row of the form.
 * 
 * @property Y.FormManager.status_marker_class
 * @type {String}
 */
FormManager.status_marker_class = 'formmgr-message-text';

/**
 * The CSS class placed on <code>status_node</code> when it is empty.
 * 
 * @property Y.FormManager.status_none_class
 * @type {String}
 */
FormManager.status_none_class = 'formmgr-status-hidden';

/**
 * The CSS class placed on <code>status_node</code> when
 * <code>displayFormMessage()</code> is called with
 * <code>error=false</code>.
 * 
 * @property Y.FormManager.status_success_class
 * @type {String}
 */
FormManager.status_success_class = 'formmgr-status-success';

/**
 * The CSS class placed on <code>status_node</code> when
 * <code>displayFormMessage()</code> is called with
 * <code>error=true</code>.
 * 
 * @property Y.FormManager.status_failure_class
 * @type {String}
 */
FormManager.status_failure_class = 'formmgr-status-failure';

/**
 * The prefix for all CSS classes placed on a form row when pre-validation
 * fails.  The full CSS class is formed by appending the value from
 * <code>Y.FormManager.status_order</code>.
 * 
 * @property Y.FormManager.row_status_prefix
 * @type {String}
 */
FormManager.row_status_prefix = 'formmgr-has';

// By using functions for the internal values, we allow the above constants
// to be changed before they are first used.

var cached_status_pattern;
var cached_row_status_pattern;
var cached_row_status_regex;

function statusPattern()
{
	if (!cached_status_pattern)
	{
		cached_status_pattern = FormManager.status_success_class+'|'+FormManager.status_failure_class;
	}
	return cached_status_pattern;
}

function rowStatusPattern()
{
	if (!cached_row_status_pattern)
	{
		cached_row_status_pattern = FormManager.row_status_prefix + '([^\\s]+)';
	}
	return cached_row_status_pattern;
}

function rowStatusRegex()
{
	if (!cached_row_status_regex)
	{
		cached_row_status_regex = new RegExp(class_re_prefix + rowStatusPattern() + class_re_suffix);
	}
	return cached_row_status_regex;
}

/**
 * <p>Names of supported status values, highest precedence first.  Default:
 * <code>[ 'error', 'warn', 'success', 'info' ]</code></p>
 * 
 * <p>This is static because it links to CSS rules that define the
 * appearance of each status type:  .formmgr-has{status}</p>
 * 
 * @config Y.FormManager.status_order
 * @type {Array}
 * @static
 */
FormManager.status_order =
[
	'error',
	'warn',
	'success',
	'info'
];

/**
 * Get the precedence of the given status name.
 * 
 * @method Y.FormManager.getStatusPrecedence
 * @static
 * @param status {String} The name of the status value.
 * @return {int} The position in the <code>status_order</code> array.
 */
FormManager.getStatusPrecedence = function(
	/* string */	status)
{
	for (var i=0; i<FormManager.status_order.length; i++)
	{
		if (status == FormManager.status_order[i])
		{
			return i;
		}
	}

	return FormManager.status_order.length;
};

/**
 * Compare two status values.
 * 
 * @method Y.FormManager.statusTakesPrecendence
 * @static
 * @param orig_status {String} The name of the original status value.
 * @param new_status {String} The name of the new status value.
 * @return {boolean} <code>true</code> if <code>new_status</code> takes precedence over <code>orig_status</code>
 */
FormManager.statusTakesPrecendence = function(
	/* string */	orig_status,
	/* string */	new_status)
{
	return (!orig_status || FormManager.getStatusPrecedence(new_status) < FormManager.getStatusPrecedence(orig_status));
};

/**
 * Get the status of the given fieldset or form row.
 * 
 * @method Y.FormManager.getElementStatus
 * @static
 * @param e {String|Object} The descriptor or DOM element.
 * @return {mixed} The status (String) or <code>false</code>.
 */
FormManager.getElementStatus = function(
	/* string/object */	e)
{
	var m = Y.one(e).get('className').match(rowStatusRegex());
	return (m && m.length > 1 ? m[1] : false);
};

function getId(
	/* string/Node/object */	e)
{
	if (Y.Lang.isString(e))
	{
		return e.replace(/^#/, '');
	}
	else if (e instanceof Y.Node)
	{
		return e.get('id');
	}
	else
	{
		return e.id;
	}
}

/**
 * Trim leading and trailing whitespace from the specified fields.
 * 
 * @method Y.FormManager.cleanValues
 * @static
 * @param e {Array|NodeList} The fields to clean.
 * @return {boolean} <code>true</code> if there are any file inputs.
 */
FormManager.cleanValues = function(
	/* array */	e)
{
	var has_file_inputs = false;
	for (var i=0; i<e.length; i++)
	{
		var input = e[i];
		var type  = input.type && input.type.toLowerCase();
		if (type == 'file')
		{
			has_file_inputs = true;

		}
		else if (type == 'select-multiple')
		{
			// don't change the value
		}
		else if (input.value)
		{
			input.value = Y.Lang.trim(input.value);
		}
	}

	return has_file_inputs;
};

function populateForm1()
{
	var collect_buttons = (this.button_list.length === 0);

	for (var i=0; i<this.form.elements.length; i++)
	{
		var e = this.form.elements[i];

		var name = e.tagName.toLowerCase();
		var type = (e.type ? e.type.toLowerCase() : null);
		if (collect_buttons &&
			(type == 'submit' || type == 'reset' || name == 'button'))
		{
			this.button_list.push(e);
		}

		if (!e.name)
		{
			continue;
		}

		var v = this.default_value_map[ e.name ];
		if (name == 'input' && type == 'file')
		{
			e.value = '';
		}
		else if (Y.Lang.isUndefined(v))
		{
			// save value for next time

			if (name == 'input' &&
				(type == 'password' || type == 'text'))
			{
				this.default_value_map[ e.name ] = e.value;
			}
			else if (name == 'input' && type == 'checkbox')
			{
				this.default_value_map[ e.name ] = (e.checked ? e.value : '');
			}
			else if (name == 'input' && type == 'radio')
			{
				var rb = this.form[ e.name ];	// null if dynamically generated in IE
				if (rb && !rb.length)
				{
					this.default_value_map[ e.name ] = rb.value;
				}
				else if (rb)
				{
					this.default_value_map[ e.name ] = rb[0].value;

					for (var j=0; j<rb.length; j++)
					{
						if (rb[j].checked)
						{
							this.default_value_map[ e.name ] = rb[j].value;
							break;
						}
					}
				}
			}
			else if ((name == 'select' && type == 'select-one') ||
					 name == 'textarea')
			{
				this.default_value_map[ e.name ] = e.value;
			}
		}
		else if (name == 'input' &&
				 (type == 'password' || type == 'text'))
		{
			e.value = v;
		}
		else if (name == 'input' &&
				 (type == 'checkbox' || type == 'radio'))
		{
			e.checked = (e.value == v);
		}
		else if (name == 'select' && type == 'select-one')
		{
			e.value = v;
			if (e.selectedIndex >= 0 &&
				e.options[ e.selectedIndex ].value !== v.toString())
			{
				e.selectedIndex = -1;
			}
		}
		else if (name == 'textarea')
		{
			e.value = v;
		}
	}
}

FormManager.prototype =
{
	/* *********************************************************************
	 * Access functions.
	 */

	/**
	 * @return {DOM} The form DOM element.
	 */
	getForm: function()
	{
		if (!this.form)
		{
			this.form = Y.config.doc.forms[ this.form_name ];
		}
		return this.form;
	},

	/**
	 * @return {boolean} <code>true</code> if the form contains file inputs.  These require special treatment when submitting via XHR.
	 */
	hasFileInputs: function()
	{
		return this.has_file_inputs;
	},

	/**
	 * Set the default values for all form elements.
	 * 
	 * @param default_value_map {Object} Mapping of form element names to values.
	 */
	setDefaultValues: function(
		/* object */	default_value_map)
	{
		this.default_value_map = default_value_map;
	},

	/**
	 * Set the default values for a single form element.
	 * 
	 * @param field_name {String} The form element name.
	 * @param default_value {String|Int|Float} The default value.
	 */
	setDefaultValue: function(
		/* string*/		field_name,
		/* string */	default_value)
	{
		this.default_value_map[ field_name ] = default_value;
	},

	/**
	 * Store the current form values in <code>default_value_map</code>.
	 */
	saveCurrentValuesAsDefault: function()
	{
		this.default_value_map = {};
		this.button_list       = [];
		populateForm1.call(this);
	},

	/* *********************************************************************
	 * Validation control
	 */

	/**
	 * Set the validation function for a form element.
	 * 
	 * @param id {String|Object} The selector for the element or the element itself
	 * @param f {Function|String|Object}
	 *		The function to call after basic validations succeed.  If this
	 *		is a String, it is resolved in the scope of the FormManager
	 *		object.  If this is an object, it must be <code>{fn:,
	 *		scope:}</code>.  The function will then be invoked in the
	 *		specified scope.
	 */
	setFunction: function(
		/* string */				id,
		/* function/string/obj */	f)
	{
		this.validation.fn[ getId(id) ] = f;
	},

	/**
	 * <p>Set the regular expression used to validate the field value.</p>
	 * 
	 * <p><strong>Since there is no default message for failed regular
	 * expression validation, this function will complain if you have not
	 * already called <code>setErrorMessages()</code> or
	 * <code>addErrorMessage</code> to specify an error message.</strong></p>
	 * 
	 * @param id {String|Object} The selector for the element or the element itself
	 * @param regex {String|RegExp} The regular expression to use
	 * @param flags {String} If regex is a String, these are the flags used to construct a RegExp.
	 */
	setRegex: function(
		/* string */		id,
		/* string/RegExp */	regex,
		/* string */		flags)		// ignored if regex is RegExp object
	{
		id = getId(id);

		if (Y.Lang.isString(regex))
		{
			this.validation.regex[id] = new RegExp(regex, flags);
		}
		else
		{
			this.validation.regex[id] = regex;
		}

		if (!this.validation_msgs[id] || !this.validation_msgs[id].regex)
		{
		}
	},

	/**
	 * <p>Set the error messages for a form element.  This can be used to
	 * override the default messages for individual elements</p>
	 * 
	 * <p>The valid error types are:</p>
	 *	<dl>
	 *	<dt><code>required</code></dt>
	 *	<dt><code>min_length</code></dt>
	 *		<dd><code>{min}</code> and <code>{max}</code> are replaced</dd>
	 *	<dt><code>max_length</code></dt>
	 *		<dd><code>{min}</code> and <code>{max}</code> are replaced</dd>
	 *	<dt><code>integer</code></dt>
	 *		<dd><code>{min}</code> and <code>{max}</code> are replaced</dd>
	 *	<dt><code>decimal</code></dt>
	 *		<dd><code>{min}</code> and <code>{max}</code> are replaced</dd>
	 *	<dt><code>regex</code></dt>
	 *		<dd>This <string>must</strong> be set for elements which validate with regular expressions.</dd>
	 *	</dl>
	 * 
	 * @param id {String|Object} The selector for the element or the element itself
	 * @param map {Object} Map of error types to error messages.
	 */
	setErrorMessages: function(
		/* string */	id,
		/* object */	map)
	{
		this.validation_msgs[ getId(id) ] = map;
	},

	/**
	 * Set one particular error message for a form element.
	 * 
	 * @param id {String|Object} The selector for the element or the element itself
	 * @param error_type {String} The error message type.  Refer to setErrorMessages() for details.
	 * @param msg {String} The error message
	 */
	addErrorMessage: function(
		/* string */	id,
		/* string */	error_type,
		/* string */	msg)
	{
		id = getId(id);
		if (!this.validation_msgs[id])
		{
			this.validation_msgs[id] = {};
		}
		this.validation_msgs[id][error_type] = msg;
	},

	/**
	 * Reset all values in the form to the defaults specified in the markup.
	 */
	clearForm: function()
	{
		this.clearMessages();
		this.form.reset();
		this.postPopulateForm();
	},

	/**
	 * Reset all values in the form to the defaults passed to the constructor.
	 */
	populateForm: function()
	{
		if (!this.default_value_map)
		{
			this.default_value_map = {};
		}

		this.clearMessages();

		populateForm1.call(this);

		// let derived class adjust

		this.postPopulateForm();
	},

	/**
	 * Hook for performing additional actions after
	 * <code>populateForm()</code> completes.
	 */
	postPopulateForm: function()
	{
	},

	/**
	 * Check if form values have been modified.
	 * 
	 * @return {boolean} <code>false</code> if all form elements have the default values passed to the constructor
	 */
	isChanged: function()
	{
		for (var i=0; i<this.form.elements.length; i++)
		{
			var e = this.form.elements[i];
			if (!e.name)
			{
				continue;
			}

			var type = (e.type ? e.type.toLowerCase() : null);
			var name = e.tagName.toLowerCase();
			var v    = this.default_value_map[ e.name ];
			if (v === null || typeof v === 'undefined')
			{
				v = "";
			}

			if (name == 'input' && type == 'file')
			{
				if (e.value)
				{
					return true;
				}
			}
			else if (name == 'input' &&
					 (type == 'password' || type == 'text' || type == 'file'))
			{
				if (e.value != v)
				{
					return true;
				}
			}
			else if (name == 'input' &&
					 (type == 'checkbox' || type == 'radio'))
			{
				var checked = (e.value == v);
				if ((checked && !e.checked) || (!checked && e.checked))
				{
					return true;
				}
			}
			else if ((name == 'select' && type == 'select-one') ||
					 name == 'textarea')
			{
				if (e.value != v)
				{
					return true;
				}
			}
		}

		return false;
	},

	/**
	 * Prepare the form for display.
	 * 
	 * @return {boolean} <code>true</code> if both pre & post hooks are happy
	 */
	prepareForm: function()
	{
		this.getForm();

		if (!this.prePrepareForm.apply(this, arguments))
		{
			return false;
		}

		// fill in starting values

		this.populateForm();

		return this.postPrepareForm.apply(this, arguments);
	},

	/**
	 * Hook called before <code>prepareForm()</code> executes.
	 * 
	 * @return {boolean} <code>false</code> cancels <code>prepareForm()</code>.
	 */
	prePrepareForm: function()
	{
		return true;
	},

	/**
	 * Hook called after <code>prepareForm()</code> executes.
	 * 
	 * @return {boolean} Return value from this function is returned by <code>prepareForm()</code>.
	 */
	postPrepareForm: function()
	{
		return true;
	},

	/**
	 * Set focus to first input field.  If a page contains multiple forms,
	 * only call this for one of them.
	 */
	initFocus: function()
	{
		for (var i=0; i<this.form.elements.length; i++)
		{
			var e = this.form.elements[i];
			if (e.disabled || e.offsetHeight === 0)
			{
				continue;
			}

			var name = e.tagName.toLowerCase();
			var type = (e.type ? e.type.toLowerCase() : null);

			if ((name == 'input' &&
				 (type == 'file' || type == 'password' || type == 'text')) ||
				name == 'textarea')
			{
				try
				{
					e.focus();
				}
				catch (ex)
				{
					// no way to determine in IE if this will fail
				}
				e.select();
				break;
			}
		}
	},

	/**
	 * Validate the form.
	 */
	validateForm: function()
	{
		this.clearMessages();
		var status = true;

		var e                = this.form.elements;
		this.has_file_inputs = FormManager.cleanValues(e);

		for (var i=0; i<e.length; i++)
		{
			var e_id     = e[i].id;
			var msg_list = this.validation_msgs[e_id];

			var info = FormManager.validateFromCSSData(e[i], msg_list);
			if (info.error)
			{
				this.displayMessage(e[i], info.error, 'error');
				status = false;
				continue;
			}

			if (info.keepGoing)
			{
				if (this.validation.regex[e_id] &&
					!this.validation.regex[e_id].test(e[i].value))
				{
					this.displayMessage(e[i], msg_list ? msg_list.regex : null, 'error');
					status = false;
					continue;
				}
			}

			var f     = this.validation.fn[e_id];
			var scope = this;
			if (Y.Lang.isFunction(f))
			{
				// use it
			}
			else if (Y.Lang.isString(f))
			{
				f = scope[f];
			}
			else if (f && f.scope)
			{
				scope = f.scope;
				f     = (Y.Lang.isString(f.fn) ? scope[f.fn] : f.fn);
			}
			else
			{
				f = null;
			}

			if (f && !f.call(scope, this.form, Y.one(e[i])))
			{
				status = false;
				continue;
			}
		}

		if (!this.postValidateForm(this.form))
		{
			status = false;
		}

		if (!status)
		{
			this.notifyErrors();
		}

		return status;
	},

	/**
	 * Hook called at the end of <code>validateForm()</code>.  This is the
	 * best place to put holistic validations that touch multiple form
	 * elements.
	 * 
	 * @return {boolean} <code>false</code> if validation fails
	 */
	postValidateForm: function(
		/* DOM element */	form)
	{
		return true;
	},

	/* *********************************************************************
	 * Buttons can be disabled during submission.
	 */

	/**
	 * Register a button that can be disabled.  Buttons contained within
	 * the form DOM element are automatically registered.
	 * 
	 * @param el {String|Object} The selector for the element or the element itself
	 */
	registerButton: function(
		/* string/object */ el)
	{
		var info =
		{
			e: Y.one(el)
		};

		this.user_button_list.push(info);
	},

	/**
	 * @return {boolean} <code>true</code> if form is enabled
	 */
	isFormEnabled: function()
	{
		return this.enabled;
	},

	/**
	 * Enable all the registered buttons.
	 */
	enableForm: function()
	{
		this.setFormEnabled(true);
	},

	/**
	 * Disable all the registered buttons.
	 */
	disableForm: function()
	{
		this.setFormEnabled(false);
	},

	/**
	 * Set the enabled state all the registered buttons.
	 * 
	 * @param enabled {boolean} <code>true</code> to enable the form, <code>false</code> to disable the form
	 */
	setFormEnabled: function(
		/* boolean */	enabled)
	{
		this.enabled = enabled;

		var disabled = ! enabled;
		for (var i=0; i<this.button_list.length; i++)
		{
			this.button_list[i].disabled = disabled;
		}

		for (i=0; i<this.user_button_list.length; i++)
		{
			var info = this.user_button_list[i];
			info.e.set('disabled', disabled);
		}
	},

	/* *********************************************************************
	 * Message display
	 */

	/**
	 * @return {boolean} <code>true</code> if there are any messages displayed, of any type
	 */
	hasMessages: function()
	{
		return this.has_messages;
	},

	/**
	 * @return {boolean} <code>true</code> if there are any error messages displayed
	 */
	hasErrors: function()
	{
		return this.has_errors;
	},

	/**
	 * Get the message type displayed for the row containing the specified element.
	 * 
	 * @param e {String|Object} The selector for the element or the element itself
	 * @return {mixed} The status (String) or <code>false</code>.
	 */
	getRowStatus: function(
		/* id/object */	e)
	{
		var p = Y.one(e).getAncestorByClassName(FormManager.row_marker_class, true);
		return FormManager.getElementStatus(p);
	},

	/**
	 * Clear all messages in <code>status_node</code> and the form rows.
	 */
	clearMessages: function()
	{
		this.has_messages = false;
		this.has_errors   = false;

		if (this.status_node)
		{
			this.status_node.set('innerHTML', '');
			this.status_node.replaceClass(statusPattern(), FormManager.status_none_class);
		}

		for (var i=0; i<this.form.elements.length; i++)
		{
			var e = this.form.elements[i];

			var name = e.tagName.toLowerCase();
			var type = (e.type ? e.type.toLowerCase() : null);
			if (name == 'button' || type == 'submit' || type == 'reset')
			{
				continue;
			}

			var p = Y.one(e).getAncestorByClassName(FormManager.row_marker_class);
			if (p && p.hasClass(rowStatusPattern()))
			{
				p.all('.'+FormManager.status_marker_class).set('innerHTML', '');
				p.removeClass(rowStatusPattern());

				p.all('.'+FormManager.field_marker_class).removeClass(rowStatusPattern());
			}
		}

		Y.one(this.form).all('fieldset').removeClass(rowStatusPattern());
	},

	/**
	 * Display a message for the form row containing the specified element.
	 * The message will only be displayed if no message with a higher
	 * precedence is already visible. (see Y.FormManager.status_order)
	 * 
	 * @param e {String|Object} The selector for the element or the element itself
	 * @param msg {String} The message
	 * @param type {String} The message type (see Y.FormManager.status_order)
	 * @param scroll {boolean} (Optional) <code>true</code> if the form row should be scrolled into view
	 * @return {boolean} true if the message was displayed, false if a higher precedence message was already there
	 */
	displayMessage: function(
		/* id/object */	e,
		/* string */	msg,
		/* string */	type,
		/* boolean */	scroll)
	{
		if (Y.Lang.isUndefined(scroll))
		{
			scroll = true;
		}

		e     = Y.one(e);
		var p = e.getAncestorByClassName(FormManager.row_marker_class);
		if (p && FormManager.statusTakesPrecendence(FormManager.getElementStatus(p), type))
		{
			var f = p.all('.'+FormManager.field_marker_class);
			if (f)
			{
				f.removeClass(rowStatusPattern());
			}

			if (msg)
			{
				p.one('.'+FormManager.status_marker_class).set('innerHTML', msg);
			}

			var new_class = FormManager.row_status_prefix + type;
			p.replaceClass(rowStatusPattern(), new_class);

			f = e.getAncestorByClassName(FormManager.field_marker_class, true);
			if (f)
			{
				f.replaceClass(rowStatusPattern(), new_class);
			}

			var fieldset = e.getAncestorByTagName('fieldset');
			if (fieldset && FormManager.statusTakesPrecendence(FormManager.getElementStatus(fieldset), type))
			{
				fieldset.removeClass(rowStatusPattern());
				fieldset.addClass(FormManager.row_status_prefix + type);
			}

			if (!this.has_messages && scroll)
			{
				p.scrollIntoView();
				try
				{
					e.focus();
				}
				catch (ex)
				{
					// no way to determine in IE if this will fail
				}
			}

			this.has_messages = true;
			if (type == 'error')
			{
				this.has_errors = true;
			}

			return true;
		}

		return false;
	},

	/**
	 * Displays a generic message in <code>status_node</code> stating that
	 * the form data failed to validate.  Override this if you want to get
	 * fancy.
	 */
	notifyErrors: function()
	{
		this.displayFormMessage(FormManager.Strings.validation_error, true, false);
	},

	/**
	 * Display a message in <code>status_node</code>.
	 * 
	 * @param msg {String} The message
	 * @param error {boolean} <code>true</code> if the message is an error
	 * @param scroll {boolean} <code>true</code> if <code>status_node</code> should be scrolled into view
	 */
	displayFormMessage: function(
		/* string */	msg,
		/* boolean */	error,
		/* boolean */	scroll)
	{
		if (Y.Lang.isUndefined(scroll))
		{
			scroll = true;
		}

		if (this.status_node)
		{
			if (!this.status_node.innerHTML)
			{
				this.status_node.replaceClass(
					FormManager.status_none_class,
					(error ? FormManager.status_failure_class :
							 FormManager.status_success_class));
				this.status_node.set('innerHTML', msg);
			}

			if (scroll)
			{
				this.status_node.scrollIntoView();
			}
		}
		else
		{
		}
	}
};

if (Y.FormManager)	// static data & functions from gallery-formmgr-css-validation
{
	for (var key in Y.FormManager)
	{
		if (Y.FormManager.hasOwnProperty(key))
		{
			FormManager[key] = Y.FormManager[key];
		}
	}
}

Y.FormManager = FormManager;


}, 'gallery-2011.04.13-22-38' ,{requires:['gallery-node-optimizations','gallery-formmgr-css-validation']});
YUI.add('gallery-paginator', function(Y) {

"use strict";
/*
Copyright (c) 2009, Yahoo! Inc. All rights reserved.
Code licensed under the BSD License:
http://developer.yahoo.net/yui/license.txt
*/

/**
 * The Paginator widget provides a set of controls to navigate through paged
 * data.
 *
 * To instantiate a Paginator, pass a configuration object to the contructor.
 * The configuration object should contain the following properties:
 * <ul>
 *   <li>rowsPerPage : <em>n</em> (int)</li>
 *   <li>totalRecords : <em>n</em> (int or Paginator.VALUE_UNLIMITED)</li>
 * </ul>
 *
 * @module gallery-paginator
 * @class Paginator
 * @constructor
 * @param config {Object} Object literal to set instance and ui component
 * configuration.
 */
function Paginator(config) {
    Paginator.superclass.constructor.call(this, config);
}


// Static members
Y.mix(Paginator, {
    NAME: "paginator",

    /**
     * Base of id strings used for ui components.
     * @static
     * @property Paginator.ID_BASE
     * @type string
     * @private
     */
    ID_BASE : 'yui-pg-',

    /**
     * Used to identify unset, optional configurations, or used explicitly in
     * the case of totalRecords to indicate unlimited pagination.
     * @static
     * @property Paginator.VALUE_UNLIMITED
     * @type number
     * @final
     */
    VALUE_UNLIMITED : -1,

    /**
     * Default template used by Paginator instances.  Update this if you want
     * all new Paginators to use a different default template.
     * @static
     * @property Paginator.TEMPLATE_DEFAULT
     * @type string
     */
    TEMPLATE_DEFAULT : "{FirstPageLink} {PreviousPageLink} {PageLinks} {NextPageLink} {LastPageLink}",

    /**
     * Common alternate pagination format, including page links, links for
     * previous, next, first and last pages as well as a rows-per-page
     * dropdown.  Offered as a convenience.
     * @static
     * @property Paginator.TEMPLATE_ROWS_PER_PAGE
     * @type string
     */
    TEMPLATE_ROWS_PER_PAGE : "{FirstPageLink} {PreviousPageLink} {PageLinks} {NextPageLink} {LastPageLink} {RowsPerPageDropdown}",

    /**
     * Storage object for UI Components
     * @static
     * @property Paginator.ui
     */
    ui : {},

    /**
     * Similar to Y.Lang.isNumber, but allows numeric strings.  This is
     * is used for attribute validation in conjunction with getters that return
     * numbers.
     *
     * @method Paginator.isNumeric
     * @param v {Number|String} value to be checked for number or numeric string
     * @returns {Boolean} true if the input is coercable into a finite number
     * @static
     */
    isNumeric : function (v) {
        return isFinite(+v);
    },

    /**
     * Return a number or null from input
     *
     * @method Paginator.toNumber
     * @param n {Number|String} a number or numeric string
     * @return Number
     * @static
     */
    toNumber : function (n) {
        return isFinite(+n) ? +n : null;
    }

},true);


Paginator.ATTRS =
{
    /**
     * REQUIRED. Number of records constituting a &quot;page&quot;
     * @attribute rowsPerPage
     * @type integer
     */
    rowsPerPage: {
        value     : 0,
        validator : Paginator.isNumeric,
        setter    : Paginator.toNumber
    },

    /**
     * Total number of records to paginate through
     * @attribute totalRecords
     * @type integer
     * @default 0
     */
    totalRecords: {
        value     : 0,
        validator : Paginator.isNumeric,
        setter    : Paginator.toNumber
    },

    /**
     * Zero based index of the record considered first on the current page.
     * For page based interactions, don't modify this attribute directly;
     * use setPage(n).
     * @attribute recordOffset
     * @type integer
     * @default 0
     */
    recordOffset: {
        value     : 0,
        validator : function (val) {
            var total = this.get('totalRecords');
            if (Paginator.isNumeric(val)) {
                val = +val;
                return total === Paginator.VALUE_UNLIMITED || total > val ||
                       (total === 0 && val === 0);
            }

            return false;
        },
        setter    : Paginator.toNumber
    },

    /**
     * Page to display on initial paint
     * @attribute initialPage
     * @type integer
     * @default 1
     */
    initialPage: {
        value     : 1,
        validator : Paginator.isNumeric,
        setter    : Paginator.toNumber
    },

    /**
     * Template used to render controls.  The string will be used as
     * innerHTML on all specified container nodes.  Bracketed keys
     * (e.g. {pageLinks}) in the string will be replaced with an instance
     * of the so named ui component.
     * @see Paginator.TEMPLATE_DEFAULT
     * @see Paginator.TEMPLATE_ROWS_PER_PAGE
     * @attribute template
     * @type string
     */
    template: {
        value : Paginator.TEMPLATE_DEFAULT,
        validator : Y.Lang.isString
    },

    /**
     * Display pagination controls even when there is only one page.  Set
     * to false to forgo rendering and/or hide the containers when there
     * is only one page of data.  Note if you are using the rowsPerPage
     * dropdown ui component, visibility will be maintained as long as the
     * number of records exceeds the smallest page size.
     * @attribute alwaysVisible
     * @type boolean
     * @default true
     */
    alwaysVisible: {
        value : true,
        validator : Y.Lang.isBoolean
    },

    // Read only attributes

    /**
     * Unique id assigned to this instance
     * @attribute id
     * @type integer
     * @final
     */
    id: {
        value    : Y.guid(),
        readOnly : true
    }
};


/**
 * Event fired when a change in pagination values is requested,
 * either by interacting with the various ui components or via the
 * setStartIndex(n) etc APIs.
 * Subscribers will receive the proposed state as the first parameter.
 * The proposed state object will contain the following keys:
 * <ul>
 *   <li>paginator - the Paginator instance</li>
 *   <li>page</li>
 *   <li>totalRecords</li>
 *   <li>recordOffset - index of the first record on the new page</li>
 *   <li>rowsPerPage</li>
 *   <li>records - array containing [start index, end index] for the records on the new page</li>
 *   <li>before - object literal with all these keys for the current state</li>
 * </ul>
 * @event changeRequest
 */

/**
 * Event fired when attribute changes have resulted in the calculated
 * current page changing.
 * @event pageChange
 */


// Instance members and methods
Y.extend(Paginator, Y.Widget,
{
    // Instance members

    /**
     * Flag used to indicate multiple attributes are being updated via setState
     * @property _batch
     * @type boolean
     * @protected
     */
    _batch : false,

    /**
     * Used by setState to indicate when a page change has occurred
     * @property _pageChanged
     * @type boolean
     * @protected
     */
    _pageChanged : false,

    /**
     * Temporary state cache used by setState to keep track of the previous
     * state for eventual pageChange event firing
     * @property _state
     * @type Object
     * @protected
     */
    _state : null,


    // Instance methods

    initializer : function(config) {
        var UNLIMITED = Paginator.VALUE_UNLIMITED,
            initialPage, records, perPage, startIndex;

        this._selfSubscribe();

        // Calculate the initial record offset
        initialPage = this.get('initialPage');
        records     = this.get('totalRecords');
        perPage     = this.get('rowsPerPage');
        if (initialPage > 1 && perPage !== UNLIMITED) {
            startIndex = (initialPage - 1) * perPage;
            if (records === UNLIMITED || startIndex < records) {
                this.set('recordOffset',startIndex);
            }
        }
    },

    /**
     * Subscribes to instance attribute change events to automate certain
     * behaviors.
     * @method _selfSubscribe
     * @protected
     */
    _selfSubscribe : function () {
        // Listen for changes to totalRecords and alwaysVisible 
        this.after('totalRecordsChange',this.updateVisibility,this);
        this.after('alwaysVisibleChange',this.updateVisibility,this);

        // Fire the pageChange event when appropriate
        this.after('totalRecordsChange',this._handleStateChange,this);
        this.after('recordOffsetChange',this._handleStateChange,this);
        this.after('rowsPerPageChange',this._handleStateChange,this);

        // Update recordOffset when totalRecords is reduced below
        this.after('totalRecordsChange',this._syncRecordOffset,this);
    },

    renderUI : function () {
        this._renderTemplate(
            this.get('contentBox'),
            this.get('template'),
            Paginator.ID_BASE + this.get('id'),
            true);

        // Show the widget if appropriate
        this.updateVisibility();
    },

    /**
     * Creates the individual ui components and renders them into a container.
     *
     * @method _renderTemplate
     * @param container {HTMLElement} where to add the ui components
     * @param template {String} the template to use as a guide for rendering
     * @param id_base {String} id base for the container's ui components
     * @param hide {Boolean} leave the container hidden after assembly
     * @protected
     */
    _renderTemplate : function (container, template, id_base, hide) {
        if (!container) {
            return;
        }

        // Hide the container while its contents are rendered
        container.setStyle('display','none');

        container.addClass(this.getClassName());

        var className = this.getClassName('ui');

        // Place the template innerHTML, adding marker spans to the template
        // html to indicate drop zones for ui components
        container.set('innerHTML', template.replace(/\{([a-z0-9_ \-]+)\}/gi,
            '<span class="'+className+' '+className+'-$1"></span>'));

        // Replace each marker with the ui component's render() output
        container.all('span.'+className).each(function(node)
        {
            this.renderUIComponent(node, id_base);
        },
        this);

        if (!hide) {
            // Show the container allowing page reflow
            container.setStyle('display','');
        }
    },

    /**
     * Replaces a marker node with a rendered UI component, determined by the
     * yui-paginator-ui-(UI component class name) in the marker's className. e.g.
     * yui-paginator-ui-PageLinks => new Y.Paginator.ui.PageLinks(this)
     *
     * @method renderUIComponent
     * @param marker {HTMLElement} the marker node to replace
     * @param id_base {String} string base the component's generated id
     */
    renderUIComponent : function (marker, id_base) {
        var par    = marker.get('parentNode'),
            clazz  = this.getClassName('ui'),
            name   = new RegExp(clazz+'-(\\w+)').exec(marker.get('className')),
            UIComp = name && Paginator.ui[name[1]],
            comp;

        if (Y.Lang.isFunction(UIComp)) {
            comp = new UIComp(this);
            if (Y.Lang.isFunction(comp.render)) {
                par.replaceChild(comp.render(id_base),marker);
            }
        }
    },

    /**
     * Hides the widget if there is only one page of data and attribute
     * alwaysVisible is false.  Conversely, it displays the widget if either
     * there is more than one page worth of data or alwaysVisible is turned on.
     * @method updateVisibility
     */
    updateVisibility : function (e) {
        var alwaysVisible = this.get('alwaysVisible'),
            totalRecords,visible,rpp,rppOptions,i,len;

        if (!e || e.type === 'alwaysVisibleChange' || !alwaysVisible) {
            totalRecords = this.get('totalRecords');
            visible      = true;
            rpp          = this.get('rowsPerPage');
            rppOptions   = this.get('rowsPerPageOptions');

            if (Y.Lang.isArray(rppOptions)) {
                for (i = 0, len = rppOptions.length; i < len; ++i) {
                    rpp = Math.min(rpp,rppOptions[i]);
                }
            }

            if (totalRecords !== Paginator.VALUE_UNLIMITED &&
                totalRecords <= rpp) {
                visible = false;
            }

            visible = visible || alwaysVisible;
            this.get('contentBox').setStyle('display', visible ? '' : 'none');
        }
    },

    /**
     * Get the total number of pages in the data set according to the current
     * rowsPerPage and totalRecords values.  If totalRecords is not set, or
     * set to Y.Paginator.VALUE_UNLIMITED, returns Y.Paginator.VALUE_UNLIMITED.
     * @method getTotalPages
     * @return {number}
     */
    getTotalPages : function () {
        var records = this.get('totalRecords'),
            perPage = this.get('rowsPerPage');

        // rowsPerPage not set.  Can't calculate
        if (!perPage) {
            return null;
        }

        if (records === Paginator.VALUE_UNLIMITED) {
            return Paginator.VALUE_UNLIMITED;
        }

        return Math.ceil(records/perPage);
    },

    /**
     * Does the requested page have any records?
     * @method hasPage
     * @param page {number} the page in question
     * @return {boolean}
     */
    hasPage : function (page) {
        if (!Y.Lang.isNumber(page) || page < 1) {
            return false;
        }

        var totalPages = this.getTotalPages();

        return (totalPages === Paginator.VALUE_UNLIMITED || totalPages >= page);
    },

    /**
     * Get the page number corresponding to the current record offset.
     * @method getCurrentPage
     * @return {number}
     */
    getCurrentPage : function () {
        var perPage = this.get('rowsPerPage');
        if (!perPage || !this.get('totalRecords')) {
            return 0;
        }
        return Math.floor(this.get('recordOffset') / perPage) + 1;
    },

    /**
     * Are there records on the next page?
     * @method hasNextPage
     * @return {boolean}
     */
    hasNextPage : function () {
        var currentPage = this.getCurrentPage(),
            totalPages  = this.getTotalPages();

        return currentPage && (totalPages === Paginator.VALUE_UNLIMITED || currentPage < totalPages);
    },

    /**
     * Get the page number of the next page, or null if the current page is the
     * last page.
     * @method getNextPage
     * @return {number}
     */
    getNextPage : function () {
        return this.hasNextPage() ? this.getCurrentPage() + 1 : null;
    },

    /**
     * Is there a page before the current page?
     * @method hasPreviousPage
     * @return {boolean}
     */
    hasPreviousPage : function () {
        return (this.getCurrentPage() > 1);
    },

    /**
     * Get the page number of the previous page, or null if the current page
     * is the first page.
     * @method getPreviousPage
     * @return {number}
     */
    getPreviousPage : function () {
        return (this.hasPreviousPage() ? this.getCurrentPage() - 1 : 1);
    },

    /**
     * Get the start and end record indexes of the specified page.
     * @method getPageRecords
     * @param page {number} (optional) The page (current page if not specified)
     * @return {Array} [start_index, end_index]
     */
    getPageRecords : function (page) {
        if (!Y.Lang.isNumber(page)) {
            page = this.getCurrentPage();
        }

        var perPage = this.get('rowsPerPage'),
            records = this.get('totalRecords'),
            start, end;

        if (!page || !perPage) {
            return null;
        }

        start = (page - 1) * perPage;
        if (records !== Paginator.VALUE_UNLIMITED) {
            if (start >= records) {
                return null;
            }
            end = Math.min(start + perPage, records) - 1;
        } else {
            end = start + perPage - 1;
        }

        return [start,end];
    },

    /**
     * Set the current page to the provided page number if possible.
     * @method setPage
     * @param newPage {number} the new page number
     * @param silent {boolean} whether to forcibly avoid firing the changeRequest event
     */
    setPage : function (page,silent) {
        if (this.hasPage(page) && page !== this.getCurrentPage()) {
            if (silent) {
                this.set('recordOffset', (page - 1) * this.get('rowsPerPage'));
            } else {
                this.fire('changeRequest',this.getState({'page':page}));
            }
        }
    },

    /**
     * Get the number of rows per page.
     * @method getRowsPerPage
     * @return {number} the current setting of the rowsPerPage attribute
     */
    getRowsPerPage : function () {
        return this.get('rowsPerPage');
    },

    /**
     * Set the number of rows per page.
     * @method setRowsPerPage
     * @param rpp {number} the new number of rows per page
     * @param silent {boolean} whether to forcibly avoid firing the changeRequest event
     */
    setRowsPerPage : function (rpp,silent) {
        if (Paginator.isNumeric(rpp) && +rpp > 0 &&
            +rpp !== this.get('rowsPerPage')) {
            if (silent) {
                this.set('rowsPerPage',rpp);
            } else {
                this.fire('changeRequest',
                    this.getState({'rowsPerPage':+rpp}));
            }
        }
    },

    /**
     * Get the total number of records.
     * @method getTotalRecords
     * @return {number} the current setting of totalRecords attribute
     */
    getTotalRecords : function () {
        return this.get('totalRecords');
    },

    /**
     * Set the total number of records.
     * @method setTotalRecords
     * @param total {number} the new total number of records
     * @param silent {boolean} whether to forcibly avoid firing the changeRequest event
     */
    setTotalRecords : function (total,silent) {
        if (Paginator.isNumeric(total) && +total >= 0 &&
            +total !== this.get('totalRecords')) {
            if (silent) {
                this.set('totalRecords',total);
            } else {
                this.fire('changeRequest',
                    this.getState({'totalRecords':+total}));
            }
        }
    },

    /**
     * Get the index of the first record on the current page
     * @method getStartIndex
     * @return {number} the index of the first record on the current page
     */
    getStartIndex : function () {
        return this.get('recordOffset');
    },

    /**
     * Move the record offset to a new starting index.  This will likely cause
     * the calculated current page to change.  You should probably use setPage.
     * @method setStartIndex
     * @param offset {number} the new record offset
     * @param silent {boolean} whether to forcibly avoid firing the changeRequest event
     */
    setStartIndex : function (offset,silent) {
        if (Paginator.isNumeric(offset) && +offset >= 0 &&
            +offset !== this.get('recordOffset')) {
            if (silent) {
                this.set('recordOffset',offset);
            } else {
                this.fire('changeRequest',
                    this.getState({'recordOffset':+offset}));
            }
        }
    },

    /**
     * Get an object literal describing the current state of the paginator.  If
     * an object literal of proposed values is passed, the proposed state will
     * be returned as an object literal with the following keys:
     * <ul>
     * <li>paginator - instance of the Paginator</li>
     * <li>page - number</li>
     * <li>totalRecords - number</li>
     * <li>recordOffset - number</li>
     * <li>rowsPerPage - number</li>
     * <li>records - [ start_index, end_index ]</li>
     * <li>before - (OPTIONAL) { state object literal for current state }</li>
     * </ul>
     * @method getState
     * @return {object}
     * @param changes {object} OPTIONAL object literal with proposed values
     * Supported change keys include:
     * <ul>
     * <li>rowsPerPage</li>
     * <li>totalRecords</li>
     * <li>recordOffset OR</li>
     * <li>page</li>
     * </ul>
     */
    getState : function (changes) {
        var UNLIMITED = Paginator.VALUE_UNLIMITED,
            M = Math, max = M.max, ceil = M.ceil,
            currentState, state, offset;

        function normalizeOffset(offset,total,rpp) {
            if (offset <= 0 || total === 0) {
                return 0;
            }
            if (total === UNLIMITED || total > offset) {
                return offset - (offset % rpp);
            }
            return total - (total % rpp || rpp);
        }

        currentState = {
            paginator    : this,
            totalRecords : this.get('totalRecords'),
            rowsPerPage  : this.get('rowsPerPage'),
            records      : this.getPageRecords()
        };
        currentState.recordOffset = normalizeOffset(
                                        this.get('recordOffset'),
                                        currentState.totalRecords,
                                        currentState.rowsPerPage);
        currentState.page = ceil(currentState.recordOffset /
                                 currentState.rowsPerPage) + 1;

        if (!changes) {
            return currentState;
        }

        state = {
            paginator    : this,
            before       : currentState,

            rowsPerPage  : changes.rowsPerPage || currentState.rowsPerPage,
            totalRecords : (Paginator.isNumeric(changes.totalRecords) ?
                                max(changes.totalRecords,UNLIMITED) :
                                +currentState.totalRecords)
        };

        if (state.totalRecords === 0) {
            state.recordOffset =
            state.page         = 0;
        } else {
            offset = Paginator.isNumeric(changes.page) ?
                        (changes.page - 1) * state.rowsPerPage :
                        Paginator.isNumeric(changes.recordOffset) ?
                            +changes.recordOffset :
                            currentState.recordOffset;

            state.recordOffset = normalizeOffset(offset,
                                    state.totalRecords,
                                    state.rowsPerPage);

            state.page = ceil(state.recordOffset / state.rowsPerPage) + 1;
        }

        state.records = [ state.recordOffset,
                          state.recordOffset + state.rowsPerPage - 1 ];

        // limit upper index to totalRecords - 1
        if (state.totalRecords !== UNLIMITED &&
            state.recordOffset < state.totalRecords && state.records &&
            state.records[1] > state.totalRecords - 1) {
            state.records[1] = state.totalRecords - 1;
        }

        return state;
    },

    /**
     * Convenience method to facilitate setting state attributes rowsPerPage,
     * totalRecords, recordOffset in batch.  Also supports calculating
     * recordOffset from state.page if state.recordOffset is not provided.
     * Fires only a single pageChange event, if appropriate.
     * This will not fire a changeRequest event.
     * @method setState
     * @param state {Object} Object literal of attribute:value pairs to set
     */
    setState : function (state) {
        if (Y.Lang.isObject(state)) {
            // get flux state based on current state with before state as well
            this._state = this.getState({});

            // use just the state props from the input obj
            state = {
                page         : state.page,
                rowsPerPage  : state.rowsPerPage,
                totalRecords : state.totalRecords,
                recordOffset : state.recordOffset
            };

            // calculate recordOffset from page if recordOffset not specified.
            // not using Y.Lang.isNumber for support of numeric strings
            if (state.page && state.recordOffset === undefined) {
                state.recordOffset = (state.page - 1) *
                    (state.rowsPerPage || this.get('rowsPerPage'));
            }

            this._batch = true;
            this._pageChanged = false;

            for (var k in state) {
                if (state.hasOwnProperty(k) && this._configs.hasOwnProperty(k)) {
                    this.set(k,state[k]);
                }
            }

            this._batch = false;
            
            if (this._pageChanged) {
                this._pageChanged = false;

                this._firePageChange(this.getState(this._state));
            }
        }
    },

    /**
     * Sets recordOffset to the starting index of the previous page when
     * totalRecords is reduced below the current recordOffset.
     * @method _syncRecordOffset
     * @param e {Event} totalRecordsChange event
     * @protected
     */
    _syncRecordOffset : function (e) {
        var v = e.newValue,rpp,state;
        if (e.prevValue !== v) {
            if (v !== Paginator.VALUE_UNLIMITED) {
                rpp = this.get('rowsPerPage');

                if (rpp && this.get('recordOffset') >= v) {
                    state = this.getState({
                        totalRecords : e.prevValue,
                        recordOffset : this.get('recordOffset')
                    });

                    this.set('recordOffset', state.before.recordOffset);
                    this._firePageChange(state);
                }
            }
        }
    },

    /**
     * Fires the pageChange event when the state attributes have changed in
     * such a way as to locate the current recordOffset on a new page.
     * @method _handleStateChange
     * @param e {Event} the attribute change event
     * @protected
     */
    _handleStateChange : function (e) {
        if (e.prevValue !== e.newValue) {
            var change = this._state || {},
                state;

            change[e.type.replace(/Change$/,'')] = e.prevValue;
            state = this.getState(change);

            if (state.page !== state.before.page) {
                if (this._batch) {
                    this._pageChanged = true;
                } else {
                    this._firePageChange(state);
                }
            }
        }
    },

    /**
     * Fires a pageChange event in the form of a standard attribute change
     * event with additional properties prevState and newState.
     * @method _firePageChange
     * @param state {Object} the result of getState(oldState)
     * @protected
     */
    _firePageChange : function (state) {
        if (Y.Lang.isObject(state)) {
            var current = state.before;
            delete state.before;
            this.fire('pageChange',{
                type      : 'pageChange',
                prevValue : state.page,
                newValue  : current.page,
                prevState : state,
                newState  : current
            });
        }
    }
});

Y.Paginator = Paginator;
/*
Copyright (c) 2009, Yahoo! Inc. All rights reserved.
Code licensed under the BSD License:
http://developer.yahoo.net/yui/license.txt
*/

/**
 * Generates an input field for setting the current page.
 *
 * @module gallery-paginator
 * @class Paginator.ui.CurrentPageInput
 * @constructor
 * @param p {Pagintor} Paginator instance to attach to
 */
Paginator.ui.CurrentPageInput = function(
	/* Paginator */	p)
{
	this.paginator = p;

	p.on('destroy',               this.destroy, this);
	p.after('recordOffsetChange', this.update,  this);
	p.after('rowsPerPageChange',  this.update,  this);
	p.after('totalRecordsChange', this.update,  this);

	p.after('pageInputClassChange', this.update, this);
};

/**
 * CSS class assigned to the span
 * @attribute pageInputClass
 * @default 'yui-paginator-page-input'
 */
Paginator.ATTRS.pageInputClass =
{
	value : Y.ClassNameManager.getClassName(Paginator.NAME, 'page-input'),
	validator : Y.Lang.isString
};

/**
 * Used as innerHTML for the span.
 * @attribute pageInputTemplate
 * @default '{currentPage} of {totalPages}'
 */
Paginator.ATTRS.pageInputTemplate =
{
	value : '{currentPage} of {totalPages}',
	validator : Y.Lang.isString
};

Paginator.ui.CurrentPageInput.prototype =
{
	/**
	 * Removes the span node and clears event listeners.
	 * @method destroy
	 * @private
	 */
	destroy: function()
	{
		this.span.remove(true);
		this.span       = null;
		this.input      = null;
		this.page_count = null;
	},

	/**
	 * Generate the nodes and return the appropriate node given the current
	 * pagination state.
	 * @method render
	 * @param id_base {string} used to create unique ids for generated nodes
	 * @return {HTMLElement}
	 */
	render: function(
		id_base)
	{
		this.span = Y.Node.create(
			'<span id="'+id_base+'-page-input">' +
			Y.substitute(this.paginator.get('pageInputTemplate'),
			{
				currentPage: '<input class="yui-page-input"></input>',
				totalPages:  '<span class="yui-page-count"></span>'
			}) +
			'</span>');
		this.span.set('className', this.paginator.get('pageInputClass'));

		this.input = this.span.one('input');
		this.input.on('change', this._onChange, this);
		this.input.on('key', this._onReturnKey, 'down:13', this);

		this.page_count = this.span.one('span.yui-page-count');

		this.update();

		return this.span;
	},

	/**
	 * Swap the link and span nodes if appropriate.
	 * @method update
	 * @param e {CustomEvent} The calling change event
	 */
	update: function(
		/* CustomEvent */ e)
	{
		if (e && e.prevVal === e.newVal)
		{
			return;
		}

		this.span.set('className', this.paginator.get('pageInputClass'));
		this.input.set('value', this.paginator.getCurrentPage());
		this.page_count.set('innerHTML', this.paginator.getTotalPages());
	},

	_onChange: function(e)
	{
		this.paginator.setPage(parseInt(this.input.get('value'), 10));
	},

	_onReturnKey: function(e)
	{
		e.halt(true);
		this.paginator.setPage(parseInt(this.input.get('value'), 10));
	}
};
/*
Copyright (c) 2009, Yahoo! Inc. All rights reserved.
Code licensed under the BSD License:
http://developer.yahoo.net/yui/license.txt
*/

/**
 * ui Component to generate the textual report of current pagination status.
 * E.g. "Now viewing page 1 of 13".
 *
 * @module gallery-paginator
 * @class Paginator.ui.CurrentPageReport
 * @constructor
 * @param p {Pagintor} Paginator instance to attach to
 */
Paginator.ui.CurrentPageReport = function (p) {
    this.paginator = p;

    p.on('destroy',this.destroy,this);
    p.after('recordOffsetChange', this.update,this);
    p.after('rowsPerPageChange', this.update,this);
    p.after('totalRecordsChange',this.update,this);

    p.after('pageReportClassChange', this.update,this);
    p.after('pageReportTemplateChange', this.update,this);
};

/**
 * CSS class assigned to the span containing the info.
 * @attribute pageReportClass
 * @default 'yui-paginator-current'
 */
Paginator.ATTRS.pageReportClass =
{
    value : Y.ClassNameManager.getClassName(Paginator.NAME, 'current'),
    validator : Y.Lang.isString
};

/**
 * Used as innerHTML for the span.  Place holders in the form of {name}
 * will be replaced with the so named value from the key:value map
 * generated by the function held in the pageReportValueGenerator attribute.
 * @attribute pageReportTemplate
 * @default '({currentPage} of {totalPages})'
 * @see pageReportValueGenerator attribute
 */
Paginator.ATTRS.pageReportTemplate =
{
    value : '({currentPage} of {totalPages})',
    validator : Y.Lang.isString
};

/**
 * Function to generate the value map used to populate the
 * pageReportTemplate.  The function is passed the Paginator instance as a
 * parameter.  The default function returns a map with the following keys:
 * <ul>
 * <li>currentPage</li>
 * <li>totalPages</li>
 * <li>startIndex</li>
 * <li>endIndex</li>
 * <li>startRecord</li>
 * <li>endRecord</li>
 * <li>totalRecords</li>
 * </ul>
 * @attribute pageReportValueGenarator
 */
Paginator.ATTRS.pageReportValueGenerator =
{
    value : function (paginator) {
        var curPage = paginator.getCurrentPage(),
            records = paginator.getPageRecords();

        return {
            'currentPage' : records ? curPage : 0,
            'totalPages'  : paginator.getTotalPages(),
            'startIndex'  : records ? records[0] : 0,
            'endIndex'    : records ? records[1] : 0,
            'startRecord' : records ? records[0] + 1 : 0,
            'endRecord'   : records ? records[1] + 1 : 0,
            'totalRecords': paginator.get('totalRecords')
        };
    },
    validator : Y.Lang.isFunction
};

/**
 * Replace place holders in a string with the named values found in an
 * object literal.
 * @static
 * @method sprintf
 * @param template {string} The content string containing place holders
 * @param values {object} The key:value pairs used to replace the place holders
 * @return {string}
 */
Paginator.ui.CurrentPageReport.sprintf = function (template, values) {
    return template.replace(/\{([\w\s\-]+)\}/g, function (x,key) {
            return (key in values) ? values[key] : '';
        });
};

Paginator.ui.CurrentPageReport.prototype = {

    /**
     * Span node containing the formatted info
     * @property span
     * @type HTMLElement
     * @private
     */
    span : null,


    /**
     * Removes the link/span node and clears event listeners
     * removal.
     * @method destroy
     * @private
     */
    destroy : function () {
        this.span.remove(true);
        this.span = null;
    },

    /**
     * Generate the span containing info formatted per the pageReportTemplate
     * attribute.
     * @method render
     * @param id_base {string} used to create unique ids for generated nodes
     * @return {HTMLElement}
     */
    render : function (id_base) {
        this.span = Y.Node.create(
            '<span id="'+id_base+'-page-report"></span>');
        this.span.set('className', this.paginator.get('pageReportClass'));
        this.update();

        return this.span;
    },
    
    /**
     * Regenerate the content of the span if appropriate. Calls
     * CurrentPageReport.sprintf with the value of the pageReportTemplate
     * attribute and the value map returned from pageReportValueGenerator
     * function.
     * @method update
     * @param e {CustomEvent} The calling change event
     */
    update : function (e) {
        if (e && e.prevVal === e.newVal) {
            return;
        }

        this.span.set('className', this.paginator.get('pageReportClass'));
        this.span.set('innerHTML', Paginator.ui.CurrentPageReport.sprintf(
            this.paginator.get('pageReportTemplate'),
            this.paginator.get('pageReportValueGenerator')(this.paginator)));
    }
};
/*
Copyright (c) 2009, Yahoo! Inc. All rights reserved.
Code licensed under the BSD License:
http://developer.yahoo.net/yui/license.txt
*/

/**
 * ui Component to generate the link to jump to the first page.
 *
 * @module gallery-paginator
 * @class Paginator.ui.FirstPageLink
 * @constructor
 * @param p {Pagintor} Paginator instance to attach to
 */
Paginator.ui.FirstPageLink = function (p) {
    this.paginator = p;

    p.on('destroy',this.destroy,this);
    p.after('recordOffsetChange',this.update,this);
    p.after('rowsPerPageChange',this.update,this);
    p.after('totalRecordsChange',this.update,this);

    p.after('firstPageLinkLabelChange',this.rebuild,this);
    p.after('firstPageLinkClassChange',this.rebuild,this);
};

/**
 * Used as innerHTML for the first page link/span.
 * @attribute firstPageLinkLabel
 * @default '&lt;&lt; first'
 */
Paginator.ATTRS.firstPageLinkLabel =
{
    value : '&lt;&lt; first',
    validator : Y.Lang.isString
};

/**
 * CSS class assigned to the link/span
 * @attribute firstPageLinkClass
 * @default 'yui-paginator-first'
 */
Paginator.ATTRS.firstPageLinkClass =
{
    value : Y.ClassNameManager.getClassName(Paginator.NAME, 'first'),
    validator : Y.Lang.isString
};

// Instance members and methods
Paginator.ui.FirstPageLink.prototype = {

    /**
     * The currently placed HTMLElement node
     * @property current
     * @type HTMLElement
     * @private
     */
    current   : null,

    /**
     * Link node
     * @property link
     * @type HTMLElement
     * @private
     */
    link      : null,

    /**
     * Span node (inactive link)
     * @property span
     * @type HTMLElement
     * @private
     */
    span      : null,


    /**
     * Removes the link/span node and clears event listeners.
     * @method destroy
     * @private
     */
    destroy : function () {
        this.link.remove(true);
        this.span.remove(true);
        this.current = this.link = this.span = null;
    },

    /**
     * Generate the nodes and return the appropriate node given the current
     * pagination state.
     * @method render
     * @param id_base {string} used to create unique ids for generated nodes
     * @return {HTMLElement}
     */
    render : function (id_base) {
        var p     = this.paginator,
            c     = p.get('firstPageLinkClass'),
            label = p.get('firstPageLinkLabel');

        this.link = Y.Node.create(
            '<a href="#" id="'+id_base+'-first-link">'+label+'</a>');
        this.link.set('className', c);
        this.link.on('click',this.onClick,this);

        this.span = Y.Node.create(
            '<span id="'+id_base+'-first-span">'+label+'</span>');
        this.span.set('className', c);

        this.current = p.getCurrentPage() > 1 ? this.link : this.span;
        return this.current;
    },

    /**
     * Swap the link and span nodes if appropriate.
     * @method update
     * @param e {CustomEvent} The calling change event
     */
    update : function (e) {
        if (e && e.prevVal === e.newVal) {
            return;
        }

        var par = this.current ? this.current.get('parentNode') : null;
        if (this.paginator.getCurrentPage() > 1) {
            if (par && this.current === this.span) {
                par.replaceChild(this.link,this.current);
                this.current = this.link;
            }
        } else {
            if (par && this.current === this.link) {
                par.replaceChild(this.span,this.current);
                this.current = this.span;
            }
        }
    },

    /**
     * Rebuild the markup.
     * @method rebuild
     * @param e {CustomEvent} The calling change event
     */
    rebuild : function (e) {
        if (e && e.prevVal === e.newVal) {
            return;
        }

        var p     = this.paginator,
            c     = p.get('firstPageLinkClass'),
            label = p.get('firstPageLinkLabel');

        this.link.set('className', c);
        this.link.set('innerHTML', label);

        this.span.set('className', c);
        this.span.set('innerHTML', label);
    },

    /**
     * Listener for the link's onclick event.  Pass new value to setPage method.
     * @method onClick
     * @param e {DOMEvent} The click event
     */
    onClick : function (e) {
        e.halt();
        this.paginator.setPage(1);
    }
};
/*
Copyright (c) 2009, Yahoo! Inc. All rights reserved.
Code licensed under the BSD License:
http://developer.yahoo.net/yui/license.txt
*/

/**
 * ui Component to display a menu for selecting the range of items to display.
 *
 * @module gallery-paginator
 * @class Paginator.ui.ItemRangeDropdown
 * @constructor
 * @param p {Pagintor} Paginator instance to attach to
 */
Paginator.ui.ItemRangeDropdown = function(
	/* Paginator */	p)
{
	this.paginator = p;

	p.on('destroy',               this.destroy, this);
	p.after('recordOffsetChange', this.update,  this);
	p.after('rowsPerPageChange',  this.update,  this);
	p.after('totalRecordsChange', this.update,  this);

	p.after('itemRangeDropdownClassChange', this.update, this);
};

/**
 * CSS class assigned to the span
 * @attribute itemRangeDropdownClass
 * @default 'yui-paginator-ir-dropdown'
 */
Paginator.ATTRS.itemRangeDropdownClass =
{
	value : Y.ClassNameManager.getClassName(Paginator.NAME, 'ir-dropdown'),
	validator : Y.Lang.isString
};

/**
 * Used as innerHTML for the span.
 * @attribute itemRangeDropdownTemplate
 * @default '{currentRange} of {totalItems}'
 */
Paginator.ATTRS.itemRangeDropdownTemplate =
{
	value : '{currentRange} of {totalItems}',
	validator : Y.Lang.isString
};

Paginator.ui.ItemRangeDropdown.prototype =
{
	/**
	 * Removes the link/span node and clears event listeners.
	 * @method destroy
	 * @private
	 */
	destroy: function()
	{
		this.span.remove(true);
		this.span       = null;
		this.menu       = null;
		this.page_count = null;
	},

	/**
	 * Generate the nodes and return the appropriate node given the current
	 * pagination state.
	 * @method render
	 * @param id_base {string} used to create unique ids for generated nodes
	 * @return {HTMLElement}
	 */
	render: function(
		id_base)
	{
		this.span = Y.Node.create(
			'<span id="'+id_base+'-item-range">' +
			Y.substitute(this.paginator.get('itemRangeDropdownTemplate'),
			{
				currentRange: '<select class="yui-current-item-range"></select>',
				totalItems:   '<span class="yui-item-count"></span>'
			}) +
			'</span>');
		this.span.set('className', this.paginator.get('itemRangeDropdownClass'));

		this.menu = this.span.one('select');
		this.menu.on('change', this._onChange, this);

		this.page_count = this.span.one('span.yui-item-count');

		this.prev_page_count = -1;
		this.prev_page_size  = -1;
		this.prev_rec_count  = -1;
		this.update();

		return this.span;
	},

	/**
	 * Swap the link and span nodes if appropriate.
	 * @method update
	 * @param e {CustomEvent} The calling change event
	 */
	update: function(
		/* CustomEvent */ e)
	{
		if (e && e.prevVal === e.newVal)
		{
			return;
		}

		var page    = this.paginator.getCurrentPage();
		var count   = this.paginator.getTotalPages();
		var size    = this.paginator.getRowsPerPage();
		var recs    = this.paginator.getTotalRecords();

		if (count != this.prev_page_count ||
			size  != this.prev_page_size  ||
			recs  != this.prev_rec_count)
		{
			var options    = Y.Node.getDOMNode(this.menu).options;
			options.length = 0;

			for (var i=1; i<=count; i++)
			{
				var range = this.paginator.getPageRecords(i);

				options[i-1] = new Option((range[0]+1) + ' - ' + (range[1]+1), i);
			}

			this.page_count.set('innerHTML', recs);

			this.prev_page_count = count;
			this.prev_page_size  = size;
			this.prev_rec_count  = recs;
		}

		this.span.set('className', this.paginator.get('itemRangeDropdownClass'));
		this.menu.set('selectedIndex', page-1);
	},

	_onChange: function(e)
	{
		this.paginator.setPage(parseInt(this.menu.get('value'), 10));
	}
};
/*
Copyright (c) 2009, Yahoo! Inc. All rights reserved.
Code licensed under the BSD License:
http://developer.yahoo.net/yui/license.txt
*/

/**
 * ui Component to generate the link to jump to the last page.
 *
 * @module gallery-paginator
 * @class Paginator.ui.LastPageLink
 * @constructor
 * @param p {Pagintor} Paginator instance to attach to
 */
Paginator.ui.LastPageLink = function (p) {
    this.paginator = p;

    p.on('destroy',this.destroy,this);
    p.after('recordOffsetChange',this.update,this);
    p.after('rowsPerPageChange',this.update,this);
    p.after('totalRecordsChange',this.update,this);

	p.after('lastPageLinkClassChange', this.rebuild, this);
	p.after('lastPageLinkLabelChange', this.rebuild, this);
};

/**
  * CSS class assigned to the link/span
  * @attribute lastPageLinkClass
  * @default 'yui-paginator-last'
  */
Paginator.ATTRS.lastPageLinkClass =
{
     value : Y.ClassNameManager.getClassName(Paginator.NAME, 'last'),
     validator : Y.Lang.isString
};

/**
 * Used as innerHTML for the last page link/span.
 * @attribute lastPageLinkLabel
 * @default 'last &gt;&gt;'
 */
Paginator.ATTRS.lastPageLinkLabel =
{
    value : 'last &gt;&gt;',
    validator : Y.Lang.isString
};

Paginator.ui.LastPageLink.prototype = {

    /**
     * Currently placed HTMLElement node
     * @property current
     * @type HTMLElement
     * @private
     */
    current   : null,

    /**
     * Link HTMLElement node
     * @property link
     * @type HTMLElement
     * @private
     */
    link      : null,

    /**
     * Span node (inactive link)
     * @property span
     * @type HTMLElement
     * @private
     */
    span      : null,

    /**
     * Empty place holder node for when the last page link is inappropriate to
     * display in any form (unlimited paging).
     * @property na
     * @type HTMLElement
     * @private
     */
    na        : null,


    /**
     * Removes the link/span node and clears event listeners
     * @method destroy
     * @private
     */
    destroy : function () {
        this.link.remove(true);
        this.span.remove(true);
        this.na.remove(true);
        this.current = this.link = this.span = this.na = null;
    },

    /**
     * Generate the nodes and return the appropriate node given the current
     * pagination state.
     * @method render
     * @param id_base {string} used to create unique ids for generated nodes
     * @return {HTMLElement}
     */
    render : function (id_base) {
        var p     = this.paginator,
            c     = p.get('lastPageLinkClass'),
            label = p.get('lastPageLinkLabel'),
            last  = p.getTotalPages();

        this.link = Y.Node.create(
            '<a href="#" id="'+id_base+'-last-link">'+label+'</a>');
        this.link.set('className', c);
        this.link.on('click',this.onClick,this);

        this.span = Y.Node.create(
            '<span id="'+id_base+'-last-span">'+label+'</span>');
        this.span.set('className', c);

        this.na = Y.Node.create(
            '<span id="'+id_base+'-last-na"></span>');

        switch (last) {
            case Paginator.VALUE_UNLIMITED :
                this.current = this.na;
                break;

            case p.getCurrentPage() :
                this.current = this.span;
                break;

            default :
                this.current = this.link;
        }

        return this.current;
    },

    /**
     * Swap the link, span, and na nodes if appropriate.
     * @method update
     * @param e {CustomEvent} The calling change event (ignored)
     */
    update : function (e) {
        if (e && e.prevVal === e.newVal) {
            return;
        }

        var par   = this.current ? this.current.get('parentNode') : null,
            after = this.link;

        if (par) {
            switch (this.paginator.getTotalPages()) {
                case Paginator.VALUE_UNLIMITED :
                    after = this.na;
                    break;

                case this.paginator.getCurrentPage() :
                    after = this.span;
                    break;
            }

            if (this.current !== after) {
                par.replaceChild(after,this.current);
                this.current = after;
            }
        }
    },

    /**
     * Rebuild the markup.
     * @method rebuild
     * @param e {CustomEvent} The calling change event (ignored)
     */
    rebuild : function (e) {
        if (e && e.prevVal === e.newVal) {
            return;
        }

        var p     = this.paginator,
            c     = p.get('lastPageLinkClass'),
            label = p.get('lastPageLinkLabel');

        this.link.set('className', c);
        this.link.set('innerHTML', label);

        this.span.set('className', c);
        this.span.set('innerHTML', label);
    },

    /**
     * Listener for the link's onclick event.  Passes to setPage method.
     * @method onClick
     * @param e {DOMEvent} The click event
     */
    onClick : function (e) {
        e.halt();
        this.paginator.setPage(this.paginator.getTotalPages());
    }
};
/*
Copyright (c) 2009, Yahoo! Inc. All rights reserved.
Code licensed under the BSD License:
http://developer.yahoo.net/yui/license.txt
*/

/**
 * ui Component to generate the link to jump to the next page.
 *
 * @module gallery-paginator
 * @class Paginator.ui.NextPageLink
 * @constructor
 * @param p {Pagintor} Paginator instance to attach to
 */
Paginator.ui.NextPageLink = function (p) {
    this.paginator = p;

    p.on('destroy',this.destroy,this);
    p.after('recordOffsetChange', this.update,this);
    p.after('rowsPerPageChange', this.update,this);
    p.after('totalRecordsChange', this.update,this);

	p.after('nextPageLinkClassChange', this.rebuild, this);
	p.after('nextPageLinkLabelChange', this.rebuild, this);
};

/**
 * CSS class assigned to the link/span
 * @attribute nextPageLinkClass
 * @default 'yui-paginator-next'
 */
Paginator.ATTRS.nextPageLinkClass =
{
    value : Y.ClassNameManager.getClassName(Paginator.NAME, 'next'),
    validator : Y.Lang.isString
};

/**
 * Used as innerHTML for the next page link/span.
 * @attribute nextPageLinkLabel

 * @default 'next &gt;'
 */
Paginator.ATTRS.nextPageLinkLabel =
{
    value : 'next &gt;',
    validator : Y.Lang.isString
};

Paginator.ui.NextPageLink.prototype = {

    /**
     * Currently placed HTMLElement node
     * @property current
     * @type HTMLElement
     * @private
     */
    current   : null,

    /**
     * Link node
     * @property link
     * @type HTMLElement
     * @private
     */
    link      : null,

    /**
     * Span node (inactive link)
     * @property span
     * @type HTMLElement
     * @private
     */
    span      : null,


    /**
     * Removes the link/span node and clears event listeners
     * @method destroy
     * @private
     */
    destroy : function () {
        this.link.remove(true);
        this.span.remove(true);
        this.current = this.link = this.span = null;
    },

    /**
     * Generate the nodes and return the appropriate node given the current
     * pagination state.
     * @method render
     * @param id_base {string} used to create unique ids for generated nodes
     * @return {HTMLElement}
     */
    render : function (id_base) {
        var p     = this.paginator,
            c     = p.get('nextPageLinkClass'),
            label = p.get('nextPageLinkLabel'),
            last  = p.getTotalPages();

        this.link = Y.Node.create(
            '<a href="#" id="'+id_base+'-next-link">'+label+'</a>');
        this.link.set('className', c);
        this.link.on('click',this.onClick,this);

        this.span = Y.Node.create(
            '<span id="'+id_base+'-next-span">'+label+'</span>');
        this.span.set('className', c);

        this.current = p.getCurrentPage() === last ? this.span : this.link;

        return this.current;
    },

    /**
     * Swap the link and span nodes if appropriate.
     * @method update
     * @param e {CustomEvent} The calling change event
     */
    update : function (e) {
        if (e && e.prevVal === e.newVal) {
            return;
        }

        var last = this.paginator.getTotalPages(),
            par  = this.current ? this.current.get('parentNode') : null;

        if (this.paginator.getCurrentPage() !== last) {
            if (par && this.current === this.span) {
                par.replaceChild(this.link,this.current);
                this.current = this.link;
            }
        } else if (this.current === this.link) {
            if (par) {
                par.replaceChild(this.span,this.current);
                this.current = this.span;
            }
        }
    },

    /**
     * Rebuild the markup.
     * @method rebuild
     * @param e {CustomEvent} The calling change event
     */
    rebuild : function (e) {
        if (e && e.prevVal === e.newVal) {
            return;
        }

        var p     = this.paginator,
            c     = p.get('nextPageLinkClass'),
            label = p.get('nextPageLinkLabel');

        this.link.set('className', c);
        this.link.set('innerHTML', label);

        this.span.set('className', c);
        this.span.set('innerHTML', label);
    },

    /**
     * Listener for the link's onclick event.  Passes to setPage method.
     * @method onClick
     * @param e {DOMEvent} The click event
     */
    onClick : function (e) {
        e.halt();
        this.paginator.setPage(this.paginator.getNextPage());
    }
};
/*
Copyright (c) 2009, Yahoo! Inc. All rights reserved.
Code licensed under the BSD License:
http://developer.yahoo.net/yui/license.txt
*/

/**
 * ui Component to generate the page links
 *
 * @module gallery-paginator
 * @class Paginator.ui.PageLinks
 * @constructor
 * @param p {Pagintor} Paginator instance to attach to
 */
Paginator.ui.PageLinks = function (p) {
    this.paginator = p;

    p.on('destroy',this.destroy,this);
    p.after('recordOffsetChange',this.update,this);
    p.after('rowsPerPageChange',this.update,this);
    p.after('totalRecordsChange',this.update,this);

    p.after('pageLinksContainerClassChange', this.rebuild,this);
    p.after('pageLinkClassChange', this.rebuild,this);
    p.after('currentPageClassChange', this.rebuild,this);
    p.after('pageLinksChange', this.rebuild,this);
};

/**
 * CSS class assigned to the span containing the page links.
 * @attribute pageLinksContainerClass
 * @default 'yui-paginator-pages'
 */
Paginator.ATTRS.pageLinksContainerClass =
{
    value : Y.ClassNameManager.getClassName(Paginator.NAME, 'pages'),
    validator : Y.Lang.isString
};

/**
 * CSS class assigned to each page link/span.
 * @attribute pageLinkClass
 * @default 'yui-paginator-page'
 */
Paginator.ATTRS.pageLinkClass =
{
    value : Y.ClassNameManager.getClassName(Paginator.NAME, 'page'),
    validator : Y.Lang.isString
};

/**
 * CSS class assigned to the current page span.
 * @attribute currentPageClass
 * @default 'yui-paginator-current-page'
 */
Paginator.ATTRS.currentPageClass =
{
    value : Y.ClassNameManager.getClassName(Paginator.NAME, 'current-page'),
    validator : Y.Lang.isString
};

/**
 * Maximum number of page links to display at one time.
 * @attribute pageLinks
 * @default 10
 */
Paginator.ATTRS.pageLinks =
{
    value : 10,
    validator : Paginator.isNumeric
};

/**
 * Function used generate the innerHTML for each page link/span.  The
 * function receives as parameters the page number and a reference to the
 * paginator object.
 * @attribute pageLabelBuilder
 * @default function (page, paginator) { return page; }
 */
Paginator.ATTRS.pageLabelBuilder =
{
    value : function (page, paginator) { return page; },
    validator : Y.Lang.isFunction
};

/**
 * Calculates start and end page numbers given a current page, attempting
 * to keep the current page in the middle
 * @static
 * @method calculateRange
 * @param {int} currentPage  The current page
 * @param {int} totalPages   (optional) Maximum number of pages
 * @param {int} numPages     (optional) Preferred number of pages in range
 * @return {Array} [start_page_number, end_page_number]
 */
Paginator.ui.PageLinks.calculateRange = function (currentPage,totalPages,numPages) {
    var UNLIMITED = Paginator.VALUE_UNLIMITED,
        start, end, delta;

    // Either has no pages, or unlimited pages.  Show none.
    if (!currentPage || numPages === 0 || totalPages === 0 ||
        (totalPages === UNLIMITED && numPages === UNLIMITED)) {
        return [0,-1];
    }

    // Limit requested pageLinks if there are fewer totalPages
    if (totalPages !== UNLIMITED) {
        numPages = numPages === UNLIMITED ?
                    totalPages :
                    Math.min(numPages,totalPages);
    }

    // Determine start and end, trying to keep current in the middle
    start = Math.max(1,Math.ceil(currentPage - (numPages/2)));
    if (totalPages === UNLIMITED) {
        end = start + numPages - 1;
    } else {
        end = Math.min(totalPages, start + numPages - 1);
    }

    // Adjust the start index when approaching the last page
    delta = numPages - (end - start + 1);
    start = Math.max(1, start - delta);

    return [start,end];
};


Paginator.ui.PageLinks.prototype = {

    /**
     * Current page
     * @property current
     * @type number
     * @private
     */
    current     : 0,

    /**
     * Span node containing the page links
     * @property container
     * @type HTMLElement
     * @private
     */
    container   : null,


    /**
     * Removes the page links container node and clears event listeners
     * @method destroy
     * @private
     */
    destroy : function () {
        this.container.remove(true);
        this.container = null;
    },

    /**
     * Generate the nodes and return the container node containing page links
     * appropriate to the current pagination state.
     * @method render
     * @param id_base {string} used to create unique ids for generated nodes
     * @return {HTMLElement}
     */
    render : function (id_base) {

        // Set up container
        this.container = Y.Node.create(
            '<span id="'+id_base+'-pages"></span>');
        this.container.on('click',this.onClick,this);

        // Call update, flagging a need to rebuild
        this.update({newVal : null, rebuild : true});

        return this.container;
    },

    /**
     * Update the links if appropriate
     * @method update
     * @param e {CustomEvent} The calling change event
     */
    update : function (e) {
        if (e && e.prevVal === e.newVal) {
            return;
        }

        var p           = this.paginator,
            currentPage = p.getCurrentPage();

        // Replace content if there's been a change
        if (this.current !== currentPage || !currentPage || e.rebuild) {
            var labelBuilder = p.get('pageLabelBuilder'),
                range        = Paginator.ui.PageLinks.calculateRange(
                                currentPage,
                                p.getTotalPages(),
                                p.get('pageLinks')),
                start        = range[0],
                end          = range[1],
                content      = '',
                linkTemplate,i;

            linkTemplate = '<a href="#" class="' + p.get('pageLinkClass') +
                           '" page="';
            for (i = start; i <= end; ++i) {
                if (i === currentPage) {
                    content +=
                        '<span class="' + p.get('currentPageClass') + ' ' +
                                          p.get('pageLinkClass') + '">' +
                        labelBuilder(i,p) + '</span>';
                } else {
                    content +=
                        linkTemplate + i + '">' + labelBuilder(i,p) + '</a>';
                }
            }

            this.container.set('className', p.get('pageLinksContainerClass'));
            this.container.set('innerHTML', content);
        }
    },

    /**
     * Force a rebuild of the page links.
     * @method rebuild
     * @param e {CustomEvent} The calling change event
     */
    rebuild     : function (e) {
        e.rebuild = true;
        this.update(e);
    },

    /**
     * Listener for the container's onclick event.  Looks for qualifying link
     * clicks, and pulls the page number from the link's page attribute.
     * Sends link's page attribute to the Paginator's setPage method.
     * @method onClick
     * @param e {DOMEvent} The click event
     */
    onClick : function (e) {
        var t = e.target;
        if (t && t.hasClass(this.paginator.get('pageLinkClass'))) {

            e.halt();

            this.paginator.setPage(parseInt(t.getAttribute('page'),10));
        }
    }

};
/*
Copyright (c) 2009, Yahoo! Inc. All rights reserved.
Code licensed under the BSD License:
http://developer.yahoo.net/yui/license.txt
*/

/**
 * ui Component to generate the link to jump to the previous page.
 *
 * @module gallery-paginator
 * @class Paginator.ui.PreviousPageLink
 * @constructor
 * @param p {Pagintor} Paginator instance to attach to
 */
Paginator.ui.PreviousPageLink = function (p) {
    this.paginator = p;

    p.on('destroy',this.destroy,this);
    p.after('recordOffsetChange',this.update,this);
    p.after('rowsPerPageChange',this.update,this);
    p.after('totalRecordsChange',this.update,this);

    p.after('previousPageLinkLabelChange',this.update,this);
    p.after('previousPageLinkClassChange',this.update,this);
};

/**
 * CSS class assigned to the link/span
 * @attribute previousPageLinkClass
 * @default 'yui-paginator-previous'
 */
Paginator.ATTRS.previousPageLinkClass =
{
    value : Y.ClassNameManager.getClassName(Paginator.NAME, 'previous'),
    validator : Y.Lang.isString
};

/**
 * Used as innerHTML for the previous page link/span.
 * @attribute previousPageLinkLabel
 * @default '&lt; prev'
 */
Paginator.ATTRS.previousPageLinkLabel =
{
    value : '&lt; prev',
    validator : Y.Lang.isString
};

Paginator.ui.PreviousPageLink.prototype = {

    /**
     * Currently placed HTMLElement node
     * @property current
     * @type HTMLElement
     * @private
     */
    current   : null,

    /**
     * Link node
     * @property link
     * @type HTMLElement
     * @private
     */
    link      : null,

    /**
     * Span node (inactive link)
     * @property span
     * @type HTMLElement
     * @private
     */
    span      : null,


    /**
     * Removes the link/span node and clears event listeners
     * @method destroy
     * @private
     */
    destroy : function () {
        this.link.remove(true);
        this.span.remove(true);
        this.current = this.link = this.span = null;
    },

    /**
     * Generate the nodes and return the appropriate node given the current
     * pagination state.
     * @method render
     * @param id_base {string} used to create unique ids for generated nodes
     * @return {HTMLElement}
     */
    render : function (id_base) {
        var p     = this.paginator,
            c     = p.get('previousPageLinkClass'),
            label = p.get('previousPageLinkLabel');

        this.link= Y.Node.create(
            '<a href="#" id="'+id_base+'-prev-link">'+label+'</a>');
        this.link.set('className', c);
        this.link.on('click',this.onClick,this);

        this.span = Y.Node.create(
            '<span id="'+id_base+'-prev-span">'+label+'</span>');
        this.span.set('className', c);

        this.current = p.getCurrentPage() > 1 ? this.link : this.span;
        return this.current;
    },

    /**
     * Swap the link and span nodes if appropriate.
     * @method update
     * @param e {CustomEvent} The calling change event
     */
    update : function (e) {
        if (e && e.prevVal === e.newVal) {
            return;
        }

        var par = this.current ? this.current.get('parentNode') : null;
        if (this.paginator.getCurrentPage() > 1) {
            if (par && this.current === this.span) {
                par.replaceChild(this.link,this.current);
                this.current = this.link;
            }
        } else {
            if (par && this.current === this.link) {
                par.replaceChild(this.span,this.current);
                this.current = this.span;
            }
        }
    },

    /**
     * Listener for the link's onclick event.  Passes to setPage method.
     * @method onClick
     * @param e {DOMEvent} The click event
     */
    onClick : function (e) {
        e.halt();
        this.paginator.setPage(this.paginator.getPreviousPage());
    }
};
/*
Copyright (c) 2009, Yahoo! Inc. All rights reserved.
Code licensed under the BSD License:
http://developer.yahoo.net/yui/license.txt
*/

/**
 * ui Component to generate the rows-per-page dropdown
 *
 * @module gallery-paginator
 * @class Paginator.ui.RowsPerPageDropdown
 * @constructor
 * @param p {Pagintor} Paginator instance to attach to
 */
Paginator.ui.RowsPerPageDropdown = function (p) {
    this.paginator = p;

    p.on('destroy',this.destroy,this);
    p.after('rowsPerPageChange',this.update,this);
    p.after('totalRecordsChange',this._handleTotalRecordsChange,this);

    p.after('rowsPerPageDropdownClassChange',this.rebuild,this);
    p.after('rowsPerPageDropdownTitleChange',this.rebuild,this);
    p.after('rowsPerPageOptionsChange',this.rebuild,this);
};

/**
 * CSS class assigned to the select node
 * @attribute rowsPerPageDropdownClass
 * @default 'yui-paginator-rpp-options'
 */
Paginator.ATTRS.rowsPerPageDropdownClass =
{
    value : Y.ClassNameManager.getClassName(Paginator.NAME, 'rpp-options'),
    validator : Y.Lang.isString
};

/**
 * CSS class assigned to the select node
 * @attribute rowsPerPageDropdownTitle
 * @default 'Rows per page'
 */
Paginator.ATTRS.rowsPerPageDropdownTitle =
{
    value : 'Rows per page',
    validator : Y.Lang.isString
};

/**
 * Array of available rows-per-page sizes.  Converted into select options.
 * Array values may be positive integers or object literals in the form<br>
 * { value : NUMBER, text : STRING }
 * @attribute rowsPerPageOptions
 * @default []
 */
Paginator.ATTRS.rowsPerPageOptions =
{
    value : [],
    validator : Y.Lang.isArray
};

Paginator.ui.RowsPerPageDropdown.prototype = {

    /**
     * select node
     * @property select
     * @type HTMLElement
     * @private
     */
    select  : null,


    /**
     * option node for the optional All value
     *
     * @property all
     * @type HTMLElement
     * @protected
     */
    all : null,


    /**
     * Removes the select node and clears event listeners
     * @method destroy
     * @private
     */
    destroy : function () {
        this.select.remove(true);
        this.all = this.select = null;
    },

    /**
     * Generate the select and option nodes and returns the select node.
     * @method render
     * @param id_base {string} used to create unique ids for generated nodes
     * @return {HTMLElement}
     */
    render : function (id_base) {
        this.select = Y.Node.create(
            '<select id="'+id_base+'-rpp"></select>');
        this.select.on('change',this.onChange,this);

        this.rebuild();

        return this.select;
    },

    /**
     * (Re)generate the select options.
     * @method rebuild
     */
    rebuild : function (e) {
        var p       = this.paginator,
            sel     = this.select,
            options = p.get('rowsPerPageOptions'),
            opts    = Y.Node.getDOMNode(sel).options,
            opt,cfg,val,i,len;

        this.all = null;

        sel.set('className', this.paginator.get('rowsPerPageDropdownClass'));
        sel.set('title', this.paginator.get('rowsPerPageDropdownTitle'));

        for (i = 0, len = options.length; i < len; ++i) {
            cfg = options[i];
            opt = opts[i] || sel.appendChild(Y.Node.create('<option/>'));
            val = Y.Lang.isValue(cfg.value) ? cfg.value : cfg;
            opt.set('innerHTML', Y.Lang.isValue(cfg.text) ? cfg.text : cfg);

            if (Y.Lang.isString(val) && val.toLowerCase() === 'all') {
                this.all  = opt;
                opt.set('value', p.get('totalRecords'));
            } else{
                opt.set('value', val);
            }

        }

        while (opts.length > options.length) {
            sel.get('lastChild').remove();
        }

        this.update();
    },

    /**
     * Select the appropriate option if changed.
     * @method update
     * @param e {CustomEvent} The calling change event
     */
    update : function (e) {
        if (e && e.prevVal === e.newVal) {
            return;
        }

        var rpp     = this.paginator.get('rowsPerPage')+'',
            options = Y.Node.getDOMNode(this.select).options,
            i,len;

        for (i = 0, len = options.length; i < len; ++i) {
            if (options[i].value === rpp) {
                options[i].selected = true;
                break;
            }
        }
    },

    /**
     * Listener for the select's onchange event.  Sent to setRowsPerPage method.
     * @method onChange
     * @param e {DOMEvent} The change event
     */
    onChange : function (e) {
        this.paginator.setRowsPerPage(
            parseInt(Y.Node.getDOMNode(this.select).options[this.select.get('selectedIndex')].value,10));
    },

    /**
     * Updates the all option value (and Paginator's rowsPerPage attribute if
     * necessary) in response to a change in the Paginator's totalRecords.
     *
     * @method _handleTotalRecordsChange
     * @param e {Event} attribute change event
     * @protected
     */
    _handleTotalRecordsChange : function (e) {
        if (!this.all || (e && e.prevVal === e.newVal)) {
            return;
        }

        this.all.set('value', e.newVal);
        if (this.all.get('selected')) {
            this.paginator.set('rowsPerPage',e.newVal);
        }
    }
};
/**********************************************************************
 * Adds per-page error notification to Paginator.ui.PageLinks.
 *
 * @module gallery-paginator
 * @class Paginator.ui.ValidationPageLinks
 * @constructor
 * @param p {Pagintor} Paginator instance to attach to
 */

Paginator.ui.ValidationPageLinks = function(
	/* Paginator */	p)
{
	Paginator.ui.ValidationPageLinks.superclass.constructor.call(this, p);

    p.after('pageStatusChange', this.rebuild, this);
};

var vpl_status_prefix = 'yui3-has';

/**
 * Array of status strings for each page.  If the status value for a page
 * is not empty, it is used to build a CSS class for the page:
 * yui3-has&lt;status&gt;
 * 
 * @attribute pageStatus
 */
Paginator.ATTRS.pageStatus =
{
	value:     [],
	validator: Y.Lang.isArray
};

Y.extend(Paginator.ui.ValidationPageLinks, Paginator.ui.PageLinks, 
{ 
	update: function(e)
	{
		if (e && e.prevVal === e.newVal)
		{
			return;
		}

		var currentPage	= this.paginator.getCurrentPage();

		var curr_markup = '<span class="{link} {curr} {status}">{label}</span>';
		var link_markup = '<a href="#" class="{link} {status}" page="{page}">{label}</a>';

		if (this.current !== currentPage || !currentPage || e.rebuild)
		{
			var linkClass    = this.paginator.get('pageLinkClass');
			var status       = this.paginator.get('pageStatus');
			var labelBuilder = this.paginator.get('pageLabelBuilder');

			var range =
				Paginator.ui.PageLinks.calculateRange(
					currentPage, this.paginator.getTotalPages(), this.paginator.get('pageLinks'));

			var content = '';
			for (var i=range[0]; i<=range[1]; i++)
			{
				content += Y.Lang.sub(i === currentPage ? curr_markup : link_markup,
				{
					link:   linkClass,
					curr:   (i === currentPage ? this.paginator.get('currentPageClass') : ''),
					status: status[i-1] ? vpl_status_prefix + status[i-1] : '',
					page:   i,
					label:  labelBuilder(i, this.paginator)
				});
			}

			this.container.set('innerHTML', content);
		}
	}
	
});


}, 'gallery-2011.04.13-22-38' ,{requires:['widget','event-key','substitute'], skinnable:true});

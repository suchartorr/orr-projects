/* ***** BEGIN LICENSE BLOCK *****
 * Copyright (c) 2005-2007 Aptana, Inc. 
 *
 * All rights reserved. This program and the accompanying materials
 * are made available under the terms of the Eclipse Public License v1.0
 * which accompanies this distribution, and is available at
 * http://www.eclipse.org/legal/epl-v10.html. If redistributing this code,
 * this entire header must remain intact.
 *
 * ***** END LICENSE BLOCK ***** */

/*
 * Aptana Logging/Assert Helper Object
 */

if ( !window.aptana )
{
	/*
	 * Aptana Object constructor 
	 */
	function AptanaDebugAPI()
	{
		/*
		 * 
		 */
		function format(objects)
		{
			var output = "";
			if (!objects || !objects.length)
				return output;
			
			var format = objects[0];
			var objIndex = 0;
			
			if (typeof(format) != "string")
			{
				format = "";
				objIndex = -1;
			}
			
			var formatParts = parseFormat(format);
			for (var i = 0; i < formatParts.length; ++i)
			{
				var formatPart = formatParts[i];
				if (formatPart && typeof(formatPart) == "object")
				{
					var object = objects[++objIndex];
					output += formatPart.func(object, formatPart.precision);
				} else
				{
					output += formatPart;
				}
			}
			return output;
		}

		/*
		 * 
		 */
		function parseFormat(format)
		{
			var formatParts = [];
			
			var reg = /((^%|[^\\]%)(\d+)?(\.)([a-zA-Z]))|((^%|[^\\]%)([a-zA-Z]))/;
			var index = 0;
			
			for (var m = reg.exec(format); m; m = reg.exec(format))
			{
				var type = m[8] ? m[8] : m[5];
				var precision = m[3] ? parseInt(m[3]) : (m[4] == "." ? -1 : 0);
				
				var func = null;
				switch (type)
				{
				case "s":
				case "f":
				case "i":
				case "d":
					func = function(obj) { return ""+obj; };
					break;
				case "o":
					func = function(obj) { return ""+obj; };
					break;
				case "x":
					func = function(obj) { return ""+obj; };
					break;
				}
				
				formatParts.push(format.substr(0, m[0][0] == "%" ? m.index : m.index+1));
				formatParts.push({func: func, precision: precision});
				
				format = format.substr(m.index+m[0].length);
			}
			
			formatParts.push(format);
			
			return formatParts;
		}

		/*
		 * 
		 */
		function onAssert(messages, caption)
		{
			var text = "";
			if ( caption )
				text += format(caption);
			if ( messages )
			{
				if ( text.length > 0 )
					text += "\n-----";
				for( var i = 0; i < messages.length; ++i )
					text += "\n" + messages[i];
			}
			window.alert(text);		
		}

		/*
		 * 
		 */
		function sliceArray(array, index)
		{
			var slice = [];
			for (var i = index; i < array.length; ++i)
				slice.push(array[i]);
			return slice;
		}
		
		this.version = "0.2.8";
		
		this.log = function(message)
		{
		}
		
		this.fail = function()
		{
			onAssert(arguments, null);
		}
		
		this.assert = function(x)
		{
			if (!x)
				onAssert(sliceArray(arguments, 1), ["%o", x]);
		}
		
		this.assertEquals = function(x, y)
		{
			if (x != y)
				onAssert(sliceArray(arguments, 2), ["%o != %o", x, y]);
		}    
		
		this.assertNotEquals = function(x, y)
		{
			if (x == y)
				onAssert(sliceArray(arguments, 2), ["%o == %o", x, y]);
		}    
		
		this.assertGreater = function(x, y)
		{
			if (x <= y)
				onAssert(sliceArray(arguments, 2), ["%o <= %o", x, y]);
		}    
		
		this.assertNotGreater = function(x, y)
		{
			if (!(x > y))
				onAssert(sliceArray(arguments, 2), ["!(%o > %o)", x, y]);
		}    
		
		this.assertLess = function(x, y)
		{
			if (x >= y)
				onAssert(sliceArray(arguments, 2), ["%o >= %o", x, y]);
		}    
		
		this.assertNotLess = function(x, y)
		{
			if (!(x < y))
				onAssert(sliceArray(arguments, 2), ["!(%o < %o)", x, y]);
		}    
		
		this.assertContains = function(x, y)
		{
			if (!(x in y))
				onAssert(sliceArray(arguments, 2), ["!(%o in %o)", x, y]);
		}    
		
		this.assertNotContains = function(x, y)
		{
			if (x in y)
				onAssert(sliceArray(arguments, 2), ["%o in %o", x, y]);
		}    
		
		this.assertTrue = function(x)
		{
			if (x != true)
				onAssert(sliceArray(arguments, 1), ["%o != %o", x, true]);
		}    
		
		this.assertFalse = function(x)
		{
			if (x != false)
				onAssert(sliceArray(arguments, 1), ["%o != %o", x, false]);
		}    
		
		this.assertNull = function(x)
		{
			if (x != null)
				onAssert(sliceArray(arguments, 1), ["%o != %o", x, null]);
		}    
		
		this.assertNotNull = function(x)
		{
			if (x == null)
				onAssert(sliceArray(arguments, 1), ["%o == %o", x, null]);
		}    
		
		this.assertUndefined = function(x)
		{
			if (x != undefined)
				onAssert(sliceArray(arguments, 1), ["%o != %o", x, undefined]);
		}    
		
		this.assertNotUndefined = function(x)
		{
			if (x == undefined)
				onAssert(sliceArray(arguments, 1), ["%o == %o", x, undefined]);
		}    
		
		this.assertInstanceOf = function(x, y)
		{
			if (!(x instanceof y))
				onAssert(sliceArray(arguments, 2), ["!(%o instanceof %o)", x, y]);
		}    
		
		this.assertNotInstanceOf = function(x, y)
		{
			if (x instanceof y)
				onAssert(sliceArray(arguments, 2), ["%o instanceof %o", x, y]);
		}    
		
		this.assertTypeOf = function(x, y)
		{
			if (typeof(x) != y)
				onAssert(sliceArray(arguments, 2), ["typeof(%o) != %o", x, y]);
		}    
		
		this.assertNotTypeOf = function(x, y)
		{
			if (typeof(x) == y)
				onAssert(sliceArray(arguments, 2), ["typeof(%o) == %o", x, y]);
		}    
		
		this.trace = function(message)
		{
		}
	}
	/* ---- */
	
	window.aptana = new AptanaDebugAPI();
	
	if ( !window.console )
	{
		window.console = window.aptana;
	}
	
	if ( !window.dump )
	{
		window.dump = function() {};
	}
}

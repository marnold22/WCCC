<?php
function abcfsl_txta($id, $suffix='') {

    switch ($id){
        case 0:
            $out = '';
            break;
        case 1:
            $out = __('Help', 'staff-list');
            break;
        case 2:
            $out = __('Images', 'staff-list');
            break;
        case 3:
            $out = __('Shortcode', 'staff-list');
            break;
        case 4:
            $out = __('Uninstall', 'staff-list');
            break;
        case 5:
            $out = __('Yes', 'staff-list');
            break;
        case 6:
            $out = __('No', 'staff-list');
            break;
        case 7:
            $out = __('Default', 'staff-list');
            break;
        case 8:
            $out = __('License', 'staff-list');
            break;
        case 9:
            $out = __('Options', 'staff-list');
            break;
        case 10:
            $out = __('Font Size', 'staff-list');
            break;
//------------------------
       case 11:
            $out = __('Documentation', 'staff-list');
            break;
       case 12:
            $out = __('Admin - Help', 'staff-list');
            break;
       case 13:
            $out = __('Layout', 'staff-list');
            break;
        case 14:
            $out = __('Width', 'staff-list');
            break;
        case 15:
            $out = __('Top Margin', 'staff-list');
            break;
        case 16:
            $out = __('Left Margin', 'staff-list');
            break;
        case 17:
            $out = __('Template Name', 'staff-list');
            break;
        case 18:
            $out = __('Template to Convert', 'staff-list');
            break;
        case 19:
            $out = __('Template Options', 'staff-list');
            break;
//------------------------
        case 20:
            $out = __('Custom', 'staff-list');
            break;
        case 21:
             $out = __('Activate Key', 'staff-list');
             break;
        case 22:
             $out = __('License Key', 'staff-list');
             break;
        case 23:
            $out = __('Add Defaults', 'staff-list');
            break;
       case 24:
            $out = __('Support', 'staff-list');
            break;
        case 25:
            $out = __('Caption', 'staff-list');
            break;
        case 26:
            $out = __('License & Help', 'staff-list');
            break;
        case 27:
            $out = __('Image', 'staff-list');
            break;
        case 28:
            $out = __('Description', 'staff-list');
            break;
        case 29:
            $out = __('Title', 'staff-list');
            break;
//------------------------
        case 30:
            $out = __('Template Converter', 'staff-list');
            break;
        case 31:
            $out = __('Item Inner Container', 'staff-list');
            break;
        case 32:
            $out = __('Error', 'staff-list');
            break;
        case 33:
            $out = __('Default Template', 'staff-list');
            break;
        case 34:
            $out = __('Save Changes');
            break;
        case 35:
            $out = __('Image ID', 'staff-list');
            break;
        case 36:
            $out = __('', 'staff-list');
            break;
        case 37:
            $out = __('', 'staff-list');
            break;
        case 38:
            $out = __('Single Line Text', 'staff-list');
            break;
        case 39:
            $out = __('Custom Text', 'staff-list');
             break;
//------------------------
        case 40:
            $out = __('Border', 'staff-list');
             break;
        case 41:
            $out = __('Underline', 'staff-list');
            break;
        case 42:
            $out = __('Highlight', 'staff-list');
            break;
       case 43:
            $out = __('Image', 'staff-list');
            break;
       case 44:
            $out = __('None', 'staff-list');
            break;
        case 45:
            $out = __('Menu Items', 'staff-list');
            break;
        case 46:
            $out = __('Menu Items Left/Right Margins', 'staff-list');
            break;
        case 47:
            $out = __('Font', 'staff-list');
            break;
        case 48:
            $out = __('Container Width', 'staff-list');
            break;
        case 49:
            $out = __('Center Items', 'staff-list');
            break;
//------------------------
        case 50:
            $out = __('Menu Items Page', 'staff-list');
            break;
        case 51:
            $out = __('Number of Columns', 'staff-list');
            break;
        case 52:
            $out = __('Social Icons', 'staff-list');
            break;
        case 53:
            $out = __('Show Links', 'staff-list');
            break;
        case 54:
            $out = __('Social Media Links (Icons)', 'staff-list');
            break;
        case 55:
            $out = __('Icons', 'staff-list');
            break;
        case 56:
            $out = __('Utilities', 'staff-list');
            break;
        case 57:
            $out = __('Categories', 'staff-list');
            break;
        case 58:
            $out = __('Staff List Pro', 'staff-list');
            break;
        case 59:
            $out = __('Staff List', 'staff-list');
            break;
//------------------------
        case 60:
            $out = __('Manual', 'staff-list');
            break;
        case 61:
            $out = __('Sort Text', 'staff-list');
            break;
        case 62:
            $out = __('Custom Link', 'staff-list');
            break;
        case 63:
            $out = __('Staff Template', 'staff-list');
            break;
        case 64:
            $out = __('Field Order - Staff', 'staff-list');
            break;
        case 65:
            $out = __('Field Order - Single', 'staff-list');
            break;
        case 66:
             $out = __('Layout - Staff', 'staff-list');
            break;
        case 67:
            $out = __('Layout - Single', 'staff-list');
            break;
        case 68:
            $out = __('Staff Page', 'staff-list');
            break;
        case 69:
            $out = __('Single Page', 'staff-list');
            break;
//------------------------
        case 70:
            $out = __('Staff Page + Single Page', 'staff-list');
            break;
        case 71:
            $out = __('Hide/Delete', 'staff-list');
            break;
        case 72:
            $out = __('Show On', 'staff-list');
            break;
        case 73:
            $out = __('Text Editor ', 'staff-list');
            break;
        case 74:
            $out = __('Single Page Text Link', 'staff-list');
            break;
        case 75:
            $out = __('Left-Right Margins', 'staff-list');
            break;
        case 76:
            $out = __('Hide', 'staff-list');
            break;
        case 77:
            $out = __('Page Title', 'staff-list');
            break;
        case 78:
            $out = __('Quick Start', 'staff-list');
            break;
        case 79:
            $out = __('Custom', 'staff-list');
            break;
//------------------------
        case 80:
            $out = __('Sort Type', 'staff-list');
            break;
        case 81:
            $out = __('Text Style', 'staff-list');
            break;
        case 82:
            $out = __('Hyperlink', 'staff-list');
            break;
        case 83:
            $out = __('Center Container', 'staff-list');
            break;
        case 84:
            $out = __('Center Image Horizontally', 'staff-list');
            break;
        case 85:
            $out = __('Default: 1%', 'staff-list');
            break;
        case 86:
            $out = __('Paragraph Text', 'staff-list');
            break;
        case 87:
            $out = __('Staff Page - Category Filter', 'staff-list');
            break;
        case 88:
            $out = __('Menu Container', 'staff-list');
            break;
        case 89:
            $out = __('Bottom Margin', 'staff-list');
            break;
//------------------------
        case 90:
            $out = __('Menu Item', 'staff-list');
            break;
        case 91:
            $out = __('Font Color', 'staff-list');
            break;
        case 92:
            $out = __('Active Item Decoration', 'staff-list');
            break;
        case 93:
            $out = __('Uppercase', 'staff-list');
            break;
        case 94:
            $out = __('Staff Page URL', 'staff-list');
            break;
        case 95:
            $out = __('Menu Label - All Records', 'staff-list');
            break ;
        case 96:
            $out = __('Category Slug', 'staff-list');
            break;
        case 97:
            $out = __('Gray', 'staff-list');
            break;
        case 98:
            $out = __('Dark Gray', 'staff-list');
            break;
        case 99:
            $out = __('Black', 'staff-list');
            break;
//------------------------
        case 100:
            $out = __('Menu', 'staff-list');
            break;
        case 101:
            $out = __('Valid data entry formats for Width or Margins: 15, 15px, 15%, 1em. Blank (no entry) = default value.', 'staff-list');
            break;
        case 104:
            $out = __('Default: 100%.', 'staff-list');
            break;
        case 106:
            $out = __('Default: 100% of the parent container.', 'staff-list');
            break;
        case 107:
            $out = __('Default: 0 (zero pixels).', 'staff-list');
             break;
        case 109:
            $out = __('Blank (no entry) = default value.', 'staff-list');
            break ;
        case 110:
            $out = __('Page you want to add the Menu to.', 'staff-list');
            break ;
        case 111:
            $out = __('Optional. Menu item to show all records. Example: <strong>All</strong>', 'staff-list');
            break ;
        case 112:
            $out = __('Category Page URL', 'staff-list');
            break ;
        case 113:
            $out = __('How to add a menu to a staff page.', 'staff-list');
            break ;
        case 114:
            $out = __('Add categoty slugs. Menu will show category names as navigation labels.', 'staff-list');
            break ;
        case 115:
            $out = __('Staff Template > TemplateOptions > Menu. Select the menu name from a drop-down.', 'staff-list');
            break ;
        case 116:
            $out = __('Image left, text right.', 'staff-list');
            break ;
        case 117:
            $out = __('Comma delimited list of single characters. Displayed as menu items and used as a filter. Example: A,B,C,D,E,F,G', 'staff-list');
            break;
        case 118:
            $out = __('Grid Container', 'staff-list');
            break ;
        case 119:
            $out = __('Container Left-Right Margins', 'staff-list');
            break;
//------------------------
        case 120:
            $out = __('Container Bottom Margin', 'staff-list');
            break;
        case 121:
            $out = __('Part', 'staff-list');
            break;
        case 122:
            $out = __('Order - Staff', 'staff-list');
            break;
        case 123:
            $out = __('Order - Single', 'staff-list');
            break;
        case 124:
            $out = __('Suffix', 'staff-list');
            break;
        case 125:
            $out = __('Field Options', 'staff-list');
            break;
        case 126:
            $out = __('Field parts are separated with a space. Use suffix option to add commas or other separators.', 'staff-list');
            break;
        case 127:
            $out = __('Example: <strong>Profile, Bio, Detail, More...</strong>', 'staff-list');
            break;
        case 128:
            $out = __('Multipart Field - Part', 'staff-list');
            break;
        case 129:
            $out = __('Field to Search', 'staff-list');
            break;
//------------------------
        case 130:
            $out = __('Field Style - Single Page', 'staff-list');
            break;
        case 131:
            $out = __('Menu Labels & Filters', 'staff-list');
            break;
        case 132:
            $out = __('For <strong>Sort Text</strong>, select field type only. For other fields select field type and id.', 'staff-list');
            break;
        case 133:
            $out = __('What template field to use for a search. Records are filtered by the first letter of the field content.', 'staff-list');
            break;
        case 134:
            $out = __('Hide = Keep data, don\'t display field on the front end.', 'staff-list');
            break;
        case 135:
            $out = __('Staff members filtered by a category.', 'staff-list');
            break;
        case 136:
            $out = __(' Replace the word \'slug\' with category slug.', 'staff-list');
            break;
        case 137:
            $out = __('Show All as a last item.', 'staff-list');
            break;
        case 138:
            $out = __('Random', 'staff-list');
            break;
        case 139:
            $out = __('Field Style', 'staff-list');
            break;
//--------------------------------
        case 140:
            $out = __('Field Location on a Single Page', 'staff-list');
            break;
        case 141:
            $out = __('Link Style', 'staff-list');
            break;
        case 142:
            $out = __('A text hyperlink to a Single Page.', 'staff-list');
            break;
        case 143:
            $out = __('Open in a new tab or window.', 'staff-list');
            break;
        case 144:
            $out = __('Two columns. Image left, text right.', 'staff-list');
            break;
        case 145:
            $out = __('Middle Section', 'staff-list');
            break;
        case 146:
            $out = __('Grid B', 'staff-list');
            break;
        case 147:
            $out = __('Show Link', 'staff-list');
            break;
        case 148:
            $out = __('Disregard if field is not selected to show up on a Single Page.', 'staff-list');
            break;
        case 149:
            $out = __('', 'staff-list');
            break;
//--------------------------------
        case 150:
            $out = __('Staff Members', 'staff-list');
            break;
        case 151:
            $out = __('Category Menus', 'staff-list');
            break;
        case 152:
            $out = __('AZ Menus', 'staff-list');
            break;
        case 153:
            $out = __('Hide Record (do not show up at the front end).', 'staff-list');
            break;
        case 154:
            $out = __('', 'staff-list');
            break;
//--------------------------------
        case 200:
            $out = __('Email link requires two input fields: <b>Link Text</b>  and <b>Email Adress</b>. The Link Text is the visible part displayed on the page.', 'staff-list');
            break;
        case 201:
            $out = __('Grid A', 'staff-list');
            break;
        case 202:
            $out = __('Custom Styles', 'staff-list');
            break;
        case 203:
            $out = __('Default: '. abcfsl_txta(54), 'staff-list');
            break;
        case 204:
            $out = __('', 'staff-list');
            break;
        case 205:
            $out = __('Field Label (Link Text)', 'staff-list');
            break;
        case 206:
            $out = __('Static Label & Text', 'staff-list');
            break;
        case 207:
            $out = __('This template has no social links activated.', 'staff-list');
            break;
        case 208:
            $out = __('Field Label', 'staff-list');
            break;
        case 209:
            $out = __('Field Description', 'staff-list');
            break;
//--------------------------------
        case 210:
            $out = __('Single Staff Member page is optional.', 'staff-list');
            break;
        case 211:
            $out = __('Field Container Style', 'staff-list');
            break;
        case 212:
            $out = __('What type of content the field will contain: text, hyperlink, email etc.', 'staff-list');
            break;
        case 213:
             $out = __('Template Layout', 'staff-list');
            break;
        case 214:
            $out = __('Template has no fields.', 'staff-list');
            break;
        case 215:
            $out = __('List', 'staff-list');
            break;
        case 216:
            $out = __('Custom Links', 'staff-list');
            break;
        case 217:
            $out = __('Input Fields', 'staff-list');
            break;
        case 218:
            $out = __('', 'staff-list');
            break;
        case 219:
            $out = __('Enter the URL of social media accounts.', 'staff-list');
            break;
//--------------------------------
        case 220:
            $out = __('Image top, text bottom.', 'staff-list');
            break;
        case 221:
            $out = __(' Supported HTML tags: <strong>p, b, br, em, i, strong.</strong> ', 'staff-list');
            break;
        case 222:
            $out = __('Field Type', 'staff-list');
            break;
        case 223:
            $out = __('The CSS class name you would like to use in order to override the default styles for this field.', 'staff-list');
            break;
        case 224:
            $out = __('The CSS style you would like to use in order to override the default styles for this field.', 'staff-list');
            break;
        case 225:
            $out = __('', 'staff-list');
            break;
        case 226:
            $out = __('Static Label Style', 'staff-list');
            break;
        case 227:
            $out = __('Text displayed on top of the data entry form.', 'staff-list');
            break;
        case 228:
            $out = __('1px image border. Default: your theme settings.', 'staff-list');
            break;
        case 229:
            $out = __('Static Label and Hyperlink', 'staff-list');
            break;
//--------------------------------
        case 230:
            $out = __('Hyperlink requires two fields: <b>Link Text</b>  and <b>URL</b>. The link text is the visible part. The URL specifies the destination address of the link.', 'staff-list');
            break;
        case 231:
            $out = __('"Pretty" Permalink', 'staff-list');
            break;
        case 232:
            $out = __('Person name or any other text. Example: <b>john-smith</b>. No spaces!', 'staff-list');
            break;
        case 233:
            $out = __('Select on what page type the field will show up.', 'staff-list');
            break;
        case 234:
            $out = __(' Copy <b>Staff Page - Category Filter</b> shortcode (from above) and paste it into post or page content editor.', 'staff-list');
            break;
        case 235:
            $out = __('Set up how and what data is displayed on Staff and Single Staff pages.', 'staff-list');
            break;
        case 236:
            $out = __('Enter an icon name. Example: Tumblr. It has to match exactly the icon name.', 'staff-list');
            break;
        case 237:
            $out = __('Select Staff Members sort type.', 'staff-list');
            break;
        case 238:
            $out = __('Icons Container Style', 'staff-list');
            break;
        case 239:
            $out = __('Form Title', 'staff-list');
            break;
//--------------------------------
        case 240:
            $out = __('Single Staff Page', 'staff-list');
            break;
        case 241:
            $out = __('Create Records', 'staff-list');
            break;
        case 242:
             $out = __('How to create and publish Staff pages', 'staff-list');
            break;
        case 243:
            $out = __('The other option is to create text hyperlink with URL parameter <strong>slpcat</strong>', 'staff-list');
            break;
        case 244:
            $out = __('Select Template', 'staff-list');
            break;
        case 245:
            $out = __('Field Description (Link Text)', 'staff-list');
            break;
        case 246:
            $out = __('', 'staff-list');
            break;
        case 247:
            $out = __('Default = Font used by your theme.', 'staff-list');
            break;
        case 248:
            $out = __('Visual Assistance', 'staff-list');
            break;
        case 249:
            $out = __('Show a wireframe to assist with laying out content.', 'staff-list');
            break;
//--------------------------------
        case 250:
            $out = __('Item Columns - Width', 'staff-list');
            break;
        case 251:
            $out = __('Text Container', 'staff-list');
            break;
        case 252:
            $out = __('Default: <b>abcfslPadLPc5</b> (padding left 5%)', 'staff-list');
            break;
        case 253:
            $out = __('Left Column Width - Right Column Width', 'staff-list');
            break;
        case 254:
            $out = __('Default: Padding top 5%.', 'staff-list');
            break;
        case 255:
            $out = __('Simply drag the items up or down and they will be saved in that order.', 'staff-list');
            break;
        case 256:
            $out = __('Hyperlink with Static Text', 'staff-list');
            break;
        case 257:
            $out = __('Optional. Provide the user some direction on how the field should be filled out.', 'staff-list');
            break;
        case 258:
            $out = __('Hyperlink Style', 'staff-list');
            break;
        case 259:
            $out = __('Link Text', 'staff-list');
            break;
//--------------------------------
        case 260:
            $out = __('Optional. Default: 100%. Valid formats: px, %. Example: 15px, 15%. No entry = default value.', 'staff-list');
            break;
        case 261:
            $out = __('Image Link', 'staff-list');
            break;
        case 262:
            $out = __('To create link to a Single Page enter <span class="abcflFontFV abcflFontS12 abcflFontW700">SP</span>. For other links enter URL.', 'staff-list');
            break;
        case 263:
            $out = __('Select Image', 'staff-list');
            break;
        case 264:
            $out = __('Enter the text to display as link text. The same text is used for all hyperlinks.', 'staff-list');
            break;
        case 265:
            $out = __('', 'staff-list');
            break;
        case 266:
            $out = __('No list items found. There maybe no items or none of the existing items is linked to this template.', 'staff-list');
            break;
        case 267:
            $out = __('Swiching templates may cause loss of data.', 'staff-list');
            break;
        case 268:
            $out = __('Staff Member Data', 'staff-list');
            break;
        case 269:
            $out = __('Optional. Text to sort staff members by. Leave empty if you\'ll sort staff list manually.', 'staff-list');
            break;
//--------------------------------
        case 270:
            $out = __('Optional.', 'staff-list');
            break;
        case 271:
            $out = __('Single Page URL', 'staff-list');
            break;
        case 272:
            $out = __('Create a new post or page.', 'staff-list');
            break;
        case 273:
            $out = __('', 'staff-list');
            break;
        case 274:
            $out = __('Save the page.', 'staff-list');
            break;
        case 275:
            $out = __('Open the newly created page.', 'staff-list');
            break;
        case 276:
            $out = __('', 'staff-list');
            break;
        case 277:
            $out = __('', 'staff-list');
            break;
        case 278:
            $out = __('Text Container Width = Image Width', 'staff-list');
            break;
        case 279:
            $out = __('Select HTML tag for field content. Default: DIV.', 'staff-list');
            break;
//--------------------------------
        case 280:
            $out = __('Staff Order', 'staff-list');
            break;
        case 281:
            $out = __('Staff Members will be sorted in ascending alphabetical order, according to the Sort Text (added on Staff Member screen).', 'staff-list');
            break;
        case 282:
            $out = __('The label of the form field. This is the field title the user will see when filling out the form.', 'staff-list');
            break;
        case 283:
            $out = __('', 'staff-list');
            break;
        case 284:
            $out = __('To use the same image for Staff Page and Single Page enter <span class="abcflFontFV abcflFontS12 abcflFontW700">SP</span>.', 'staff-list');
            break;
        case 285:
            $out = __('Top Section', 'staff-list');
            break;
        case 286:
            $out = __('Field Display Options', 'staff-list');
            break;
        case 287:
            $out = __('Field HTML Tag.', 'staff-list');
            break;
        case 288:
            $out = __('Demo', 'staff-list');
            break;
        case 289:
            $out = __('Custom Inline Style', 'staff-list');
            break;
//--------------------------------
        case 290:
            $out = __('Email', 'staff-list');
            break;
        case 291:
            $out = __('Field ID', 'staff-list');
            break;
        case 292:
            $out = __('Static Label Text', 'staff-list');
            break;
        case 293:
            $out = __('Text to display next to data entered by the user. <b>Example:</b> Phone:', 'staff-list');
            break;
        case 294:
            $out = __('Demo Records', 'staff-list');
            break;
        case 295:
            $out = __('Select: <b>Yes</b> to horizontally center content container when width is >100%.', 'staff-list');
            break;
        case 296:
            $out = __('Lock the field to prevent accidental changes.', 'staff-list');
            break;
        case 297:
            $out = __('Field Locked. Editing disabled.', 'staff-list');
            break;
        case 298:
            $out = __(' You should see a blank page.', 'staff-list');
            break;
        case 299:
            $out = __('Add Layout Options for a Single Page?', 'staff-list');
            break;
//--------------------------------
        case 300:
            $out = __('Field Label (Email Adress)', 'staff-list');
            break;
        case 301:
            $out = __('Item Container', 'staff-list');
            break;
        case 302:
            $out = __('Field Label (URL)', 'staff-list');
            break;
        case 303:
            $out = __('Single Page SEO Options', 'staff-list');
            break;
        case 304:
            $out = __(' Copy <b>Staff Page</b> shortcode (from above) and paste it into post or page content editor.', 'staff-list');
            break;
        case 305:
            $out = __('All staf members linked to this template.', 'staff-list');
            break;
        case 306:
            $out = __('Page to display record of a single staff member.', 'staff-list');
            break;
        case 307:
            $out = __('Default: 40 pixels.', 'staff-list');
            break;
        case 308:
            $out = __('Container has 12 sections of equal width. Select how many you want to use for left and right columns.', 'staff-list');
            break;
        case 309:
            $out = __('Optional. Text container can span the width of the column or be limited to width of the image.', 'staff-list');
            break;
//--------------------------------
        case 310:
            $out = __('Staff Page Image', 'staff-list');
            break;
        case 311:
            $out = __('Single Page Image', 'staff-list');
            break;
        case 312:
            $out = __('Image URL', 'staff-list');
            break;
        case 313:
            $out = __('Name - Multipart Field', 'staff-list');
            break;
        case 314:
            $out = __('The number of columns in a row.', 'staff-list');
            break;
        case 315:
             $out = __('Bottom Section', 'staff-list');
            break;
         case 316:
            $out = __('', 'staff-list');
            break;
        case 317:
            $out = __('Field Description (URL)', 'staff-list');
            break;
        case 318:
            $out = __('Field Description (Email Address)', 'staff-list');
            break;
        case 319:
            $out = __('Field Labels', 'staff-list');
            break;
//--------------------------------
        case 320:
            $out = __('Add a New Field', 'staff-list');
            break;
        case 321:
            $out = __('Delete Field', 'staff-list');
            break;
        case 322:
            $out = __('Displays a single staff member.', 'staff-list');
            break;
        case 323:
            $out = __('Custom CSS Class', 'staff-list');
            break;
        case 324:
            $out = __('Horizontal Line', 'staff-list');
            break;
        case 325:
            $out = __('Both Staff Member and Staff List pages use the same template and data.', 'staff-list');
            break;
        case 326:
            $out = __('How to create and publish a Single Page.', 'staff-list');
            break;
        case 327:
            $out = __('You can\'t delete this template. It\'s used by one or more staff members.', 'staff-list');
            break;
        case 328:
            $out = __('Example: [abcf-staff-grid id="5586" category="faculty"]', 'staff-list');
            break;
        case 329:
            $out = __('How link Staff page to a Single Page.', 'staff-list');
            break;
//--------------------------------
        case 330:
            $out = __('1. Open Staff Member data entry form.', 'staff-list');
            break;
        case 331:
            $out = __('2. To create an image  hyperlink enter <span class="abcflFontFV abcflFontS12 abcflFontW700">SP</span> as Image Link.', 'staff-list');
            break;
        case 332:
            $out = __('3. For text hyperlinks enter <span class="abcflFontFV abcflFontS12 abcflFontW700">SP</span> as link URL.', 'staff-list');
            break;
        case 333:
            $out = __('  Copy page\'s URL from the address bar and paste it into Staff Page URL field (above).', 'staff-list');
            break;
        case 334:
            $out = __(' Create a staff page if not already created.', 'staff-list');
            break;
        case 335:
            $out = __(' Open the staff page for edit. ', 'staff-list');
            break;
        case 336:
            $out = __(' Copy menu shortcode (from above) and paste it into the staff page page content editor.', 'staff-list');
            break;
        case 337:
            $out = __(' You can add title or any other text above and between the shortcodes', 'staff-list');
            break;
        case 338:
            $out = __('', 'staff-list');
            break;
        case 339:
            $out = __(' Paste it above the Staff Page shortcode.', 'staff-list');
            break;
        case 340:
            $out = __(' Test the new menu.', 'staff-list');
            break;
        case 341:
            $out = __(' Open the staff page for a preview.', 'staff-list');
            break;

        case 350:
            $out = __('Screen Min Width: 1200px.', 'staff-list');
            break;
        case 351:
            $out = __('Screen Min Width: 992px.', 'staff-list');
            break;
        case 352:
            $out = __('Screen Min Width: 768px.', 'staff-list');
            break;
        case 353:
            $out = __('Required. Also number of columns for all screens if other column options (below ) are not set.', 'staff-list');
            break;
        case 354:
            $out = __('Phones with screen resolution of 767 pixels or lower, will display a single column.', 'staff-list');
            break;
        case 355:
            $out = __('Optional. Screen between 992 and 1200px. (iPad lanscape mode)', 'staff-list');
            break;
        case 356:
            $out = __('Optional. Screen between 768 and 992px. (iPad portrait mode)', 'staff-list');
            break;
        case 357:
            $out = __('This field type has been discontinued and will be removed in a future!', 'staff-list');
            break;
        case 358:
            $out = __('Please replace with: Template Options > Single Page > <strong>Single Page Text Link</strong>.', 'staff-list');
            break;
        case 359:
            $out = __('Convert to Layout.', 'staff-list');
            break;
//--------------------------------
        case 360:
            $out = __('All requred options have to be selected.', 'staff-list');
            break;
        case 361:
            $out = __('Converts one template layout to another layout.', 'staff-list');
            break;
        case 362:
            $out = __('Convert Template to a New Layout.', 'staff-list');
            break;
        default:
            $out = '';
            break;
    }
    return $out . $suffix;
}

//function abcfsl_txta_reqired( $id, $suffix='' ) {
//    $txt = abcfsl_txta( $id, $suffix );
//    return $txt . '<b class="abcflRed abcflFontS14"> *</b>';
//}

function abcfsl_txta_r( $id, $suffix='' ) {
    $txt = abcfsl_txta( $id, $suffix );
    return $txt . '<b class="abcflRed abcflFontS14"> *</b>';
}
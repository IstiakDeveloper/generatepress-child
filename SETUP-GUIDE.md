# JRDM Website Setup Guide
## GeneratePress Child Theme Configuration

### ধাপ ১: Child Theme Activate করুন
1. WordPress Admin → Appearance → Themes
2. "GeneratePress Child - JRDM" theme খুঁজে Activate করুন

### ধাপ ২: WordPress Customizer Settings

#### Colors (Appearance → Customize → Colors)
1. **Base Colors:**
   - Base: `#1A1A1A` (Text color)
   - Base Hover: `#1B5E20` (Primary Green)
   - Text: `#555555` (Light text)

2. **Link Colors:**
   - Link: `#1B5E20` (Primary Green)
   - Link Hover: `#8B0000` (Secondary Burgundy)

3. **Button Colors:**
   - Button Background: `#F9A825` (Accent Yellow)
   - Button Text: `#1A1A1A` (Dark)
   - Button Hover Background: `#F9B842`
   - Button Hover Text: `#1A1A1A`

4. **Header Colors:**
   - Header Background: `#FFFFFF` (White)
   - Header Text: `#1A1A1A`
   - Header Link: `#1B5E20`
   - Header Link Hover: `#8B0000`

5. **Navigation Colors:**
   - Navigation Background: `#FFFFFF`
   - Navigation Text: `#1A1A1A`
   - Navigation Text Hover: `#1B5E20`
   - Navigation Current Item: `#8B0000`

6. **Footer Colors:**
   - Footer Background: `#1A1A1A` (Dark)
   - Footer Text: `#FFFFFF`
   - Footer Link: `#FFFFFF`
   - Footer Link Hover: `#F9A825` (Accent Yellow)

#### Typography (Appearance → Customize → Typography)
1. **Body Font:**
   - Font Family: `Inter` (English)
   - Font Size: `16px`
   - Font Weight: `400`

2. **Headings:**
   - H1: `42px`, Weight `700`, Font: `Inter`
   - H2: `30px`, Weight `600`, Font: `Inter`
   - H3: `20px`, Weight `500`, Font: `Inter`

3. **Site Title:**
   - Font: `Hind Siliguri` (Bengali)
   - Size: `24px`
   - Weight: `700`

4. **Navigation:**
   - Font: `Inter`
   - Size: `16px`
   - Weight: `500`

**Google Fonts Setup:**
- Add to Additional CSS:
```css
@import url('https://fonts.googleapis.com/css2?family=Hind+Siliguri:wght@400;500;600;700&family=Inter:wght@400;500;600;700&display=swap');
```

#### Layout (Appearance → Customize → Layout)
1. **Container Width:** `1200px`
2. **Content Padding:** `40px` (top/bottom), `20px` (left/right)
3. **Sidebar Layout:** No Sidebar (for homepage)

#### Header (Appearance → Customize → Header)
1. **Top Bar:**
   - Enable Top Bar: ✅ Yes
   - Top Bar Background: `#1B5E20` (Primary Green)
   - Top Bar Text: `#FFFFFF`
   - Top Bar Padding: `8px` (top/bottom)

2. **Logo:**
   - Upload logo (60-70px height recommended)
   - Logo Width: `Auto`
   - Logo Height: `60px`

3. **Site Identity:**
   - Site Title: `JRDM`
   - Tagline: `জয়পুরহাট রুরাল ডেভেলপমেন্ট মুভমেন্ট`

4. **Navigation:**
   - Navigation Location: `Float Right`
   - Sticky Navigation: ✅ Yes
   - Navigation Dropdown: `Click`

#### Footer (Appearance → Customize → Footer)
1. **Footer Widgets:** Enable 3 columns
2. **Footer Bar:**
   - Footer Bar Background: `#1B5E20` (Primary Green)
   - Footer Bar Text: `#FFFFFF`
   - Copyright Text: `© JRDM 2025`

### ধাপ ৩: Menu Setup
1. **Primary Menu** (Appearance → Menus):
   - হোম
   - আমাদের সম্পর্কে
   - ঋণ কার্যক্রম
   - প্রজেক্ট
   - সাফল্যের গল্প
   - নোটিশ
   - ডাউনলোড
   - যোগাযোগ

2. **Footer Menu:**
   - Privacy Policy
   - Terms & Conditions
   - Sitemap

### ধাপ ৪: Homepage Setup
1. **Create Homepage Page:**
   - Pages → Add New
   - Title: "হোম"
   - Use Gutenberg blocks (see HOMEPAGE-TEMPLATE.md)

2. **Set as Front Page:**
   - Settings → Reading
   - Select "A static page"
   - Homepage: Select your homepage page

### ধাপ ৫: Favicon Setup
1. **Crop Logo Shield Part:**
   - Open logo in image editor
   - Crop only the shield part (top portion with sun, trees, soil, JRDM text)
   - Save as: `favicon.png` (512x512px recommended)

2. **Convert to ICO:**
   - Use online tool: https://favicon.io/favicon-converter/
   - Upload `favicon.png`
   - Download `favicon.ico`

3. **Upload Favicon:**
   - Appearance → Customize → Site Identity
   - Upload Site Icon (favicon.ico)
   - Also upload `apple-touch-icon.png` (180x180px)

### ধাপ ৬: Top Bar Content Setup
Create a custom HTML widget or use GeneratePress hooks:

**Top Bar Left:**
- Phone: `+880-XXX-XXXXXXX`
- Email: `info@jrdm.org`

**Top Bar Right:**
- MRA Registration: `MRA-XXXXX`
- Language Switcher: `বাংলা / English`

### ধাপ ৭: Widget Areas Setup
1. **Footer Widget 1:** Organization Info + Logo + Social Media
2. **Footer Widget 2:** Quick Links
3. **Footer Widget 3:** Contact Info + Map

### ধাপ ৮: Additional CSS (Optional Customizations)
Go to Appearance → Customize → Additional CSS and add any specific overrides if needed.

### Color Reference Quick Copy:
```
Primary Green: #1B5E20
Secondary Burgundy: #8B0000
Accent Yellow: #F9A825
Background Off-white: #F5F5F0
Card White: #FFFFFF
Text Dark: #1A1A1A
Text Light: #555555
Border Light Green: #C8E6C9
```

### Font Reference:
- Bengali: `Hind Siliguri`
- English: `Inter`

### Next Steps:
1. Follow HOMEPAGE-TEMPLATE.md to create homepage content
2. Upload logo and favicon
3. Add real content and images
4. Test on mobile devices
5. Optimize images with Smush plugin

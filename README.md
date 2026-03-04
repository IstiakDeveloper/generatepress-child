# JRDM Website - GeneratePress Child Theme

**Joypurhat Rural Development Movement (JRDM)** - Professional Microcredit NGO Website

## 🎨 Design System

### Color Palette
- **Primary:** `#1B5E20` (Dark Green)
- **Secondary:** `#8B0000` (Burgundy/Logo Red)
- **Accent:** `#F9A825` (Golden Yellow/Sun)
- **Background:** `#F5F5F0` (Off-white)
- **Card Background:** `#FFFFFF` (White)
- **Text:** `#1A1A1A` (Dark Charcoal)
- **Text Light:** `#555555` (Gray)
- **Border:** `#C8E6C9` (Light Greenish)

### Typography
- **Bengali:** Hind Siliguri (Google Fonts)
- **English:** Inter (Google Fonts)

### Font Sizes
- H1: 42px (Bold)
- H2: 30px (SemiBold)
- H3: 20px (Medium)
- Body: 16px (Regular)
- Small: 14px

## 📁 File Structure

```
generatepress-child/
├── style.css                 # Child theme header
├── functions.php             # Theme functions & enqueues
├── assets/
│   └── css/
│       └── custom.css        # Main custom styles
├── SETUP-GUIDE.md           # Detailed setup instructions
├── HOMEPAGE-TEMPLATE.md     # Homepage block structure guide
└── README.md                # This file
```

## 🚀 Quick Start

### 1. Activate Child Theme
1. Go to **WordPress Admin → Appearance → Themes**
2. Find **"GeneratePress Child - JRDM"**
3. Click **Activate**

### 2. Basic Setup
Follow the detailed instructions in **SETUP-GUIDE.md**:
- Configure Colors in Customizer
- Set Typography (Hind Siliguri + Inter)
- Configure Header & Footer
- Set up Menus
- Upload Logo & Favicon

### 3. Create Homepage
Follow **HOMEPAGE-TEMPLATE.md** for Gutenberg block structure:
- Hero Section
- Statistics Bar
- Services Section
- Success Stories
- Notice Board
- Partner Logos

## 🎯 Key Features

✅ **Minimal & Fast Design** - Optimized for performance  
✅ **Professional Layout** - Clean, modern microcredit NGO design  
✅ **Responsive** - Mobile-first approach  
✅ **Bengali + English** - Bilingual support  
✅ **Gutenberg Ready** - Built with WordPress blocks  
✅ **Custom Color System** - CSS variables for easy customization  
✅ **Consistent Cards** - Professional card styling throughout  

## 📝 Customization

### CSS Variables
All colors and design tokens are defined as CSS variables in `assets/css/custom.css`. Modify these for quick theme-wide changes:

```css
:root {
    --jrdm-primary: #1B5E20;
    --jrdm-secondary: #8B0000;
    --jrdm-accent: #F9A825;
    /* ... more variables */
}
```

### Adding Custom Styles
Add your custom CSS to `assets/css/custom.css` or use WordPress Customizer → Additional CSS.

## 🔧 Required Plugins (Recommended)

- **Smush** - Image optimization
- **WP Super Cache** or **W3 Total Cache** - Caching
- **Contact Form 7** - Contact forms
- **Yoast SEO** - SEO optimization

## 📱 Responsive Breakpoints

- **Desktop:** 1200px+ (Full layout)
- **Tablet:** 768px - 1199px (2 columns)
- **Mobile:** < 768px (Single column)

## 🎨 Component Classes

### Buttons
- `.btn-primary` - Yellow primary button
- `.btn-secondary` - Green secondary button
- `.btn-outline` - Outline button
- `.btn-danger` - Red urgent button

### Cards
- `.card` - Standard card with shadow
- `.story-card` - Success story card
- `.stat-box` - Statistics box

### Sections
- `.hero-section` - Hero section
- `.stats-bar` - Statistics bar
- `.services-section` - Services section
- `.success-stories-section` - Success stories
- `.notice-board-section` - Notice board

## 📞 Support

For theme customization help, refer to:
- **SETUP-GUIDE.md** - Detailed setup instructions
- **HOMEPAGE-TEMPLATE.md** - Homepage structure guide
- GeneratePress Documentation: https://docs.generatepress.com

## 📄 License

This child theme inherits the GPL license from GeneratePress.

---

**Version:** 1.0.0  
**Last Updated:** February 2025  
**Compatible with:** GeneratePress 3.6.1+

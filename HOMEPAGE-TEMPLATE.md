# Homepage Template Structure
## Gutenberg Blocks Guide for JRDM Website

এই গাইড অনুসারে WordPress Gutenberg Editor এ homepage তৈরি করুন।

---

## ১. Hero Section

**Block Type:** Cover Block (Full Width)

**Settings:**
- Background: Image (গ্রামের মাঠ/সভার real ছবি) বা Gradient
- Overlay Color: `#1B5E20` (Primary Green) with 80% opacity
- Min Height: `80vh`

**Content Structure:**
```
[Cover Block]
  └─ [Group Block - Centered]
      ├─ Heading (H1): "গ্রামীণ উন্নয়নে আমাদের অঙ্গীকার"
      ├─ Paragraph: "জয়পুরহাট রুরাল ডেভেলপমেন্ট মুভমেন্ট (JRDM) - ক্ষুদ্রঋণ ও গ্রামীণ উন্নয়নের মাধ্যমে দারিদ্র্য বিমোচনে কাজ করছে"
      └─ [Buttons Group]
          ├─ Button 1: "ঋণের আবেদন করুন" (Primary - Yellow)
          └─ Button 2: "আমাদের জানুন" (Outline - Green)
```

**CSS Classes to Add:**
- Cover Block: `hero-section`
- Group Block: `hero-content`
- Heading: `hero-title`
- Paragraph: `hero-description`
- Buttons Group: `hero-buttons`

---

## ২. Statistics Bar

**Block Type:** Group Block (Full Width)

**Background Color:** `#1B5E20` (Primary Green)

**Content Structure:**
```
[Group Block - Full Width]
  └─ [Columns Block - 4 Columns]
      ├─ Column 1:
      │   ├─ Number: "15,000+"
      │   └─ Label: "মোট সদস্য"
      ├─ Column 2:
      │   ├─ Number: "৳50 কোটি+"
      │   └─ Label: "বিতরণকৃত ঋণ"
      ├─ Column 3:
      │   ├─ Number: "25+"
      │   └─ Label: "সক্রিয় প্রজেক্ট"
      └─ Column 4:
          ├─ Number: "50,000+"
          └─ Label: "উপকারভোগী"
```

**CSS Classes:**
- Group Block: `stats-bar`
- Columns Block: `stats-container`
- Each Column: `stat-box`
- Number: `stat-number`
- Label: `stat-label`

**Styling Tips:**
- Numbers: Large, bold, color `#F9A825` (Accent Yellow)
- Labels: White text, smaller font

---

## ৩. সেবাসমূহ (Services) Section

**Block Type:** Group Block

**Background:** White (`#FFFFFF`)

**Content Structure:**
```
[Group Block]
  ├─ Heading (H2): "আমাদের সেবাসমূহ"
  ├─ Paragraph: "ক্ষুদ্রঋণ, প্রশিক্ষণ ও উন্নয়নমূলক কার্যক্রমের মাধ্যমে গ্রামীণ জনগোষ্ঠীর আর্থিক স্বনির্ভরতা গড়ে তুলতে আমরা কাজ করছি"
  └─ [Columns Block - 4 Columns]
      ├─ Column 1: [Card]
      │   ├─ Icon/Image (Green circle background)
      │   ├─ Heading (H3): "ক্ষুদ্রঋণ"
      │   ├─ Paragraph: "ছোট ব্যবসা ও আয়বর্ধক কাজের জন্য সহজ শর্তে ঋণ"
      │   └─ Link: "বিস্তারিত →"
      ├─ Column 2: [Card]
      │   ├─ Icon/Image
      │   ├─ Heading: "উদ্যোক্তা ঋণ"
      │   ├─ Paragraph: "নতুন ব্যবসা শুরু করতে উদ্যোক্তাদের জন্য বিশেষ ঋণ"
      │   └─ Link: "বিস্তারিত →"
      ├─ Column 3: [Card]
      │   ├─ Icon/Image
      │   ├─ Heading: "কৃষি ঋণ"
      │   ├─ Paragraph: "কৃষি কাজ ও খামার উন্নয়নের জন্য ঋণ সুবিধা"
      │   └─ Link: "বিস্তারিত →"
      └─ Column 4: [Card]
          ├─ Icon/Image
          ├─ Heading: "প্রশিক্ষণ"
          ├─ Paragraph: "ব্যবসা ও দক্ষতা উন্নয়ন প্রশিক্ষণ কার্যক্রম"
          └─ Link: "বিস্তারিত →"
```

**CSS Classes:**
- Section Group: `services-section`
- Columns: `services-grid`
- Each Card: `card` or `wp-block-group is-style-card`
- Icon Container: `service-icon`
- Card Title: `card-title`
- Card Link: `card-link`

---

## ৪. সাফল্যের গল্প (Success Stories)

**Block Type:** Group Block

**Background:** Off-white (`#F5F5F0`)

**Content Structure:**
```
[Group Block]
  ├─ Heading (H2): "সাফল্যের গল্প"
  ├─ Paragraph: "আমাদের সদস্যদের সাফল্যের গল্প"
  └─ [Columns Block - 3 Columns]
      ├─ Column 1: [Story Card]
      │   ├─ Image (Circular, 100x100px)
      │   ├─ Name: "রোকেয়া বেগম"
      │   ├─ Location: "জয়পুরহাট সদর"
      │   └─ Excerpt: "ক্ষুদ্রঋণ নিয়ে ছোট দোকান খুলে এখন স্বাবলম্বী..."
      ├─ Column 2: [Story Card]
      │   └─ (Same structure)
      └─ Column 3: [Story Card]
          └─ (Same structure)
```

**CSS Classes:**
- Section: `success-stories-section`
- Columns: `stories-grid`
- Card: `story-card`
- Image: `story-avatar`
- Name: `story-name`
- Location: `story-location`
- Excerpt: `story-excerpt`

---

## ৫. নোটিশ বোর্ড (Notice Board)

**Block Type:** Group Block

**Background:** White

**Content Structure:**
```
[Group Block]
  ├─ Heading (H2): "নোটিশ বোর্ড"
  └─ [Columns Block - 60/40 Split]
      ├─ Column 1 (60%): [Notice List]
      │   ├─ Notice Item 1
      │   │   ├─ Date: "১৮ ফেব্রুয়ারি, ২০২৫"
      │   │   └─ Title: "নতুন ঋণ আবেদনের বিজ্ঞপ্তি"
      │   ├─ Notice Item 2
      │   └─ Notice Item 3
      └─ Column 2 (40%): [Latest Event/Image]
          └─ Featured Image or Event Card
```

**CSS Classes:**
- Section: `notice-board-section`
- Container: `notice-board-container`
- List: `notice-list`
- Item: `notice-item`
- Date: `notice-date`
- Title: `notice-title`

---

## ৬. Donor/Partner Logos

**Block Type:** Group Block

**Background:** White

**Content Structure:**
```
[Group Block]
  ├─ Heading (H2): "আমাদের সহযোগী"
  └─ [Columns Block - Auto-fit]
      ├─ Logo 1 (Grayscale, hover color)
      ├─ Logo 2
      ├─ Logo 3
      └─ Logo 4
```

**CSS Classes:**
- Section: `partners-section`
- Grid: `partners-grid`
- Logo: `partner-logo`

---

## ৭. Call to Action Section (Optional)

**Block Type:** Cover Block

**Background:** Gradient (Green to Dark Green)

**Content:**
```
[Cover Block]
  └─ [Group Block - Centered]
      ├─ Heading: "আমাদের সাথে যোগ দিন"
      ├─ Paragraph: "গ্রামীণ উন্নয়নের এই যাত্রায় অংশ নিন"
      └─ Button: "যোগাযোগ করুন"
```

---

## Block-by-Block Instructions:

### Hero Section Setup:
1. Add **Cover Block**
2. Set background image or gradient
3. Add overlay color: `rgba(27, 94, 32, 0.8)`
4. Inside Cover, add **Group Block** (centered)
5. Add **Heading** (H1) - Bengali text
6. Add **Paragraph** - Description
7. Add **Buttons Block** or two separate **Button Blocks**
8. Style buttons: Primary (Yellow) and Outline (Green)

### Statistics Bar Setup:
1. Add **Group Block** (Full Width)
2. Set background color: `#1B5E20`
3. Add **Columns Block** (4 columns)
4. In each column:
   - Add **Heading** (large number) - Style: Large, Bold, Yellow color
   - Add **Paragraph** (label) - White text
5. Add CSS classes to columns: `stat-box`

### Services Setup:
1. Add **Group Block**
2. Add **Heading** (H2) - Centered
3. Add **Paragraph** - Centered subtitle
4. Add **Columns Block** (4 columns, responsive)
5. In each column, add **Group Block** with class `card`
6. Inside each card:
   - Add **Image Block** or **Icon** (circular, green background)
   - Add **Heading** (H3)
   - Add **Paragraph**
   - Add **Link Block**

### Success Stories Setup:
1. Similar to Services, but 3 columns
2. Use **Image Block** with circular crop
3. Add CSS class `story-card` to each card group

### Notice Board Setup:
1. Add **Columns Block** with 60/40 split
2. Left column: List of notices (use **List Block** or custom HTML)
3. Right column: Featured image or event card

---

## CSS Classes Reference:

Add these classes in Block Settings → Advanced → Additional CSS class(es):

- `hero-section` - Hero cover block
- `hero-content` - Hero content group
- `stats-bar` - Statistics section
- `services-section` - Services section
- `success-stories-section` - Success stories section
- `notice-board-section` - Notice board section
- `partners-section` - Partners section
- `card` - Any card component
- `stat-box` - Statistics box
- `story-card` - Success story card

---

## Tips:
1. Use **Spacer Blocks** between sections (60px recommended)
2. Set **Content Width** to `1200px` in Layout settings
3. Use **Full Width** blocks for Hero and Statistics
4. Test responsiveness on mobile
5. Optimize all images before upload
6. Use **Smush** plugin to compress images

---

## Example Block Structure (Visual):

```
┌─────────────────────────────────────┐
│  HERO SECTION (Cover Block)         │
│  Full Width, 80vh height            │
└─────────────────────────────────────┘
┌─────────────────────────────────────┐
│  STATISTICS BAR (Group Block)        │
│  Green background, 4 columns        │
└─────────────────────────────────────┘
┌─────────────────────────────────────┐
│  SERVICES SECTION                    │
│  White background, 4 service cards  │
└─────────────────────────────────────┘
┌─────────────────────────────────────┐
│  SUCCESS STORIES                     │
│  Off-white background, 3 story cards│
└─────────────────────────────────────┘
┌─────────────────────────────────────┐
│  NOTICE BOARD                        │
│  60/40 split: Notices | Event       │
└─────────────────────────────────────┘
┌─────────────────────────────────────┐
│  PARTNERS LOGOS                      │
│  Grayscale logos, hover color       │
└─────────────────────────────────────┘
```

---

এই গাইড অনুসরণ করে Gutenberg Editor এ homepage তৈরি করুন। প্রতিটি section এ proper CSS classes যোগ করতে ভুলবেন না!

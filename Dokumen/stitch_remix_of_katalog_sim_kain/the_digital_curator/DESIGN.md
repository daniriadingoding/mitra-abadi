# Design System Document

## 1. Overview & Creative North Star: "The Digital Curator"

This design system is engineered to elevate a textile archive into a premium, editorial experience. The Creative North Star, **"The Digital Curator,"** views the interface not as a software tool, but as a high-end gallery space. 

To break away from "template-style" layouts, this system utilizes intentional white space (asymmetry), high-contrast typographic scales, and layered surfaces. We treat pixels like fine threads—every element must be precise, sophisticated, and quiet enough to let the textile assets remain the focal point. The aesthetic balances the warmth of high-end textiles with the cold precision of a digital archive.

---

## 2. Colors: Tonal Depth & Modern Sophistication

The palette is anchored by a vibrant, heritage-grade red, supported by a spectrum of architectural grays.

### Core Palette
*   **Primary (`#BD0015` / `#E61E25`):** Reserved strictly for high-impact actions and brand signatures. Use the `primary_container` (#E61E25) for hero moments and the deeper `primary` (#BD0015) for refined interactive states.
*   **Surface (`#F9F9F9`):** Our "canvas." A crisp, off-white that feels more organic and premium than a sterile `#FFFFFF`.
*   **On-Surface (`#1A1C1C`):** High-contrast dark gray/black for maximum typographic legibility.

### The "No-Line" Rule
Prohibit the use of 1px solid borders for sectioning. Structural boundaries must be defined through background shifts or tonal transitions. To separate a header from a body, transition from `surface` to `surface_container_low`. This creates a seamless, modern flow that mimics high-end editorial magazines.

### Surface Hierarchy & Nesting
Treat the UI as a physical stack of archive folders:
1.  **Base:** `surface` (#F9F9F9)
2.  **Sectioning:** `surface_container_low` (#F3F3F3)
3.  **Interactive Elements:** `surface_container_highest` (#E2E2E2)
4.  **Floating Detail:** `surface_container_lowest` (#FFFFFF)

### The "Glass & Gradient" Rule
To add "soul," use subtle gradients on primary CTAs, transitioning from `primary` to `primary_container`. For floating navigation or archival filters, employ **Glassmorphism**: use a semi-transparent `surface_container_lowest` with a 12px backdrop blur to allow textile colors to bleed through softly.

---

## 3. Typography: Editorial Precision

We use **Manrope** exclusively. Its geometric yet humanist qualities bridge the gap between technical archive and luxury fashion.

*   **Display (Large/Medium):** Use for hero textile titles. Tracking should be tightened (-2%) for a bespoke, tucked-in feel.
*   **Headline (Small/Medium):** Used for section starts. Place headlines asymmetrically to create visual interest.
*   **Title (Medium/Small):** For archival metadata and card headers.
*   **Body (Large/Medium):** Set with generous line-height (1.6) to ensure the technical descriptions of textiles are breathable and readable.
*   **Labels:** Use for technical specs (e.g., thread count, weave type). These should be `label-md` or `label-sm`, all-caps with 5% letter spacing for an "archival stamp" look.

---

## 4. Elevation & Depth: Tonal Layering

Shadows and borders are the enemies of minimalism. We use the **Layering Principle**.

*   **Tonal Lift:** Instead of a shadow, place a `#FFFFFF` (`surface_container_lowest`) card on a `#F3F3F3` (`surface_container_low`) background. The 4% luminance difference is enough to signal depth to the human eye.
*   **Ambient Shadows:** When a floating modal is required, use a shadow with a 40px blur, 0px offset, and 6% opacity using a tint of `on_surface`. It should feel like a soft glow of light, not a drop-shadow.
*   **The "Ghost Border" Fallback:** If accessibility requires a container line, use the `outline_variant` token at **15% opacity**. It should be felt, not seen.

---

## 5. Components: Minimalist Utility

### Buttons
*   **Primary:** Solid `primary_container` (#E61E25). Sharp `md` (0.375rem) corners. No border.
*   **Tertiary (Editorial):** Underlined `label-md` text. The underline should be 1px and offset by 4px, using the `primary` color as a signature accent.

### Archival Chips
*   Used for fabric categories (Silk, Cotton, Jacquard).
*   **Style:** `surface_container_high` background with `on_surface` text. No border. Use `full` (9999px) roundedness to contrast the sharper grid of the images.

### Input Fields
*   **The "Line-Only" Input:** Eschew the box. Use a 1px bottom border of `outline_variant` that transitions to `primary` on focus. This mimics a curator’s handwritten ledger.

### Cards & Lists (The Curator’s Grid)
*   **Constraint:** Zero divider lines. 
*   **Separation:** Use the Spacing Scale (32px or 48px gaps) to separate list items. 
*   **Image Treatment:** All textile images must sit on a `surface_container_highest` background to ensure light fabrics don't bleed into the UI.

---

## 6. Do's and Don'ts

### Do
*   **DO** use generous white space. If you think there is enough space, add 16px more.
*   **DO** use the red sparingly. It is a "laser pointer," not a "paint roller."
*   **DO** align text to a strict baseline grid but allow image containers to be offset for an "organic" feel.

### Don't
*   **DON'T** use 100% black. Always use `on_surface` (#1A1C1C) for a softer, premium touch.
*   **DON'T** use standard "drop shadows" (e.g., 0px 4px 10px). They feel cheap and "SaaS-like."
*   **DON'T** use dividers to separate sections. If the content isn't separated by white space or tonal shifts, the layout is too cluttered.
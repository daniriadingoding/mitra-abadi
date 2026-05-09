# Design System Strategy: The Textile Archivist

## 1. Overview & Creative North Star
**Creative North Star: "The Digital Curator"**

Most inventory systems feel like cold spreadsheets. For Mitra Abadi, we are moving away from "utilitarian software" and toward a "high-end digital archive." This design system treats fabric rolls like pieces of art and data points like curated metadata. 

We break the "template" look by rejecting the standard grid. By utilizing **intentional asymmetry** (e.g., large-scale typography paired with compact data) and **tonal layering**, we create an environment that feels both authoritative and breathable. This is "Soft Industrialism"—the efficiency of a warehouse met with the elegance of a showroom.

---

## 2. Colors & Surface Logic
The palette is rooted in a foundation of "Trustworthy Blues" and "Crisp Whites," punctuated by a "Refined Burnt Orange" (`tertiary`) for moments of high-intent action.

### The "No-Line" Rule
To achieve a premium, editorial feel, **1px solid borders are strictly prohibited for sectioning.** We do not "box" content. Instead, boundaries are defined through background shifts.
*   **Example:** A `surface-container-low` navigation rail sitting against a `surface` main content area.
*   **The Result:** A layout that feels seamless and expansive rather than fragmented.

### Surface Hierarchy & Nesting
Treat the UI as a physical stack of materials. We use the `surface-container` tiers to define depth:
*   **Background (`#f8f9fa`):** The base canvas.
*   **Surface Container Low (`#f3f4f5`):** Secondary areas like sidebars or secondary navigation.
*   **Surface Container Lowest (`#ffffff`):** Reserved for "active" content pieces like catalog cards or data entry modules. This creates a "lift" effect without needing a shadow.

### The "Glass & Gradient" Rule
To avoid a flat, "out-of-the-box" look:
*   **Glassmorphism:** Use for floating headers or modals. Apply `surface` at 80% opacity with a `20px` backdrop blur. This allows the fabric colors in the catalog to bleed through subtly.
*   **Signature Textures:** Use a subtle linear gradient for Primary CTAs, transitioning from `primary` (`#003f87`) to `primary-container` (`#0056b3`). This adds a "silk-like" depth to buttons.

---

## 3. Typography: The Editorial Scale
We use a dual-typeface system to balance "High-End Elegance" with "Technical Precision."

*   **Display & Headlines (Manrope):** A modern, geometric sans-serif used for large page titles and catalog categories. It feels architectural and sophisticated.
    *   *Editorial Touch:* Use `headline-lg` with a slightly tighter letter-spacing (-0.02em) to feel "tight" and professional.
*   **Titles, Body, & Labels (Inter):** The workhorse for data. Inter provides exceptional legibility in fabric inventory tables.
    *   *The "Metadata" Look:* For `label-md` and `label-sm`, use uppercase with 0.05em tracking to give the inventory data a "serialized" or "archival" aesthetic.

---

## 4. Elevation & Depth
In this design system, shadows are a last resort, not a default.

*   **The Layering Principle:** Place a `surface-container-lowest` card on a `surface-container-low` section. The value shift is enough to signal hierarchy.
*   **Ambient Shadows:** If an element must float (e.g., a dropdown or modal), use a high-blur, low-opacity shadow. 
    *   *Formula:* `0px 12px 32px rgba(25, 28, 29, 0.06)`. The shadow color is a tinted version of `on-surface` to feel natural.
*   **The Ghost Border:** If a boundary is required for accessibility in forms, use the `outline-variant` token at **15% opacity**. It should be a whisper of a line, not a hard stroke.

---

## 5. Component Guidelines

### Buttons: High-Intent Touchpoints
*   **Primary:** Uses the Primary-to-Container gradient. Corner radius: `md` (0.375rem).
*   **Tertiary (Accent):** Reserved for "Final Sale," "Critical Alert," or "Primary CTA" in the catalog. Uses the `tertiary` (`#772600`) color. This deep, refined orange cuts through the blue for instant recognition.
*   **Interaction:** On hover, increase the gradient intensity; do not use a simple "darken" overlay.

### Cards & Catalog Units
*   **The Rule:** No borders. Use vertical white space (`1.5rem` minimum) to separate units.
*   **Image Treatment:** Fabric swatches should have a `sm` (0.125rem) radius to feel like cut cloth samples.
*   **Content:** Pair a `title-md` (Inter) for the fabric name with a `label-sm` (Inter, All-Caps) for the SKU number.

### Data Tables: The Inventory Core
*   **Dividers:** Forbid the use of horizontal lines between rows. Use a subtle background toggle (`surface` vs `surface-container-low`) or simply 12px of vertical padding per row.
*   **Status Indicators:** Use `tertiary-container` for "Low Stock" and `primary-container` for "In Transit." These should be pill-shaped (`full` roundedness) with `label-sm` text.

### Form Elements: Quick Entry
*   **Inputs:** Use `surface-container-lowest` for the input field background. 
*   **Focus State:** Instead of a thick border, use a 2px "Ghost Border" of `primary` and a subtle inner-glow.

---

## 6. Do’s and Don’ts

### Do
*   **DO** use whitespace as a structural element. If a layout feels cluttered, increase the padding—don't add a line.
*   **DO** use `surface-bright` for the most important data highlights in the inventory dashboard.
*   **DO** treat the fabric images as the hero. UI elements should be the "frame," not the "picture."

### Don’t
*   **DON’T** use pure black (#000000) for text. Use `on-surface` (`#191c1d`) to maintain the "editorial" softness.
*   **DON’T** use standard "Drop Shadows" on cards. Rely on tonal shifts between `surface` tiers.
*   **DON’T** use the `tertiary` accent color for non-critical elements. It is a high-contrast tool; use it sparingly to maintain its power.
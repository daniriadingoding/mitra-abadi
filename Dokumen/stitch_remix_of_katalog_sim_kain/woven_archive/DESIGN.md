# Design System Specification: The Digital Curator

## 1. Overview & Creative North Star
The Mitra Abadi Textile Archive is not a standard inventory tool; it is a digital sanctuary for history, texture, and craftsmanship. The Creative North Star for this system is **"The Digital Curator."** 

To honor the heritage of textile design, the interface must move beyond the "SaaS template" aesthetic. We achieve this through an **Editorial Brutalism**—combining high-contrast typography, expansive white space, and a rigid yet asymmetrical layout. The design breaks the standard grid by overlapping archival imagery with metadata containers, creating a sense of physical layering similar to fabric swatches on a loom. Every interaction should feel intentional, quiet, and premium, allowing the vibrant red of the brand and the rich textures of the textiles to be the primary focus.

## 2. Colors
The color palette is built on a foundation of "Gallery Whites" and "Archival Greys," punctuated by the high-energy **#E61E25** brand red.

### Surface Hierarchy & Nesting
We reject flat design. Depth is achieved through **Tonal Layering**.
- **The "No-Line" Rule:** Do not use 1px solid borders for sectioning large areas. Instead, define boundaries through background color shifts. Place `surface_container_low` (#f3f3f3) sections on a `surface` (#f9f9f9) background to create structural distinction.
- **Surface Tiers:** Use `surface_container_lowest` (#ffffff) for the most interactive, "top-layer" elements like cards, while using `surface_dim` (#dadada) for background utility bars. This "stacks" the UI like sheets of fine paper.

### The "Glass & Gradient" Rule
To add soul to the digital experience:
- **Glassmorphism:** Use `surface` colors at 80% opacity with a `backdrop-blur` (20px-30px) for floating navigation or modal overlays.
- **Signature Textures:** For high-impact CTAs, use a subtle linear gradient from `primary` (#bd0015) to `primary_container` (#e61e25) at a 135-degree angle. This prevents the red from feeling "flat" and gives it a satin-like finish.

## 3. Typography: The Manrope Scale
Typography is the scaffolding of the archival experience. **Manrope** is used exclusively to maintain a modern, geometric clarity.

- **Display (Large/Med/Small):** Reserved for archive titles and hero metrics. Use `on_surface` (#1a1c1c) with tight letter-spacing (-0.02em) to create an authoritative, editorial feel.
- **Headlines & Titles:** Used for section headers. These should act as clear anchors for the curator’s eye.
- **Body (LG/MD/SM):** Set `body-md` as the default for metadata. Ensure a generous line-height (1.6) to reflect the "breathing room" found in high-end art catalogues.
- **Labels:** Use `label-md` in uppercase with +0.05em tracking for secondary data points or category tags to create a rhythmic contrast against body text.

## 4. Elevation & Depth
In this design system, "elevation" is a feeling, not just a shadow.

- **The Layering Principle:** Physicality is key. Place a `surface_container_lowest` (#ffffff) card on a `surface_container_low` (#f3f3f3) section. The subtle shift in hex code provides enough contrast to imply height without visual clutter.
- **Ambient Shadows:** Standard drop shadows are forbidden. If an element must float (like a dropdown or modal), use a high-spread, low-opacity shadow: `box-shadow: 0 12px 40px rgba(26, 28, 28, 0.06)`. The tint is derived from `on_surface` to keep it natural.
- **The "Ghost Border":** For interactive inputs or grid cells where accessibility requires a line, use `outline_variant` at 20% opacity. Never use 100% opaque, high-contrast borders.

## 5. Components

### Cards & Lists
*   **The Rule of No Dividers:** Forbid the use of horizontal rules (`<hr>`). Separate list items using vertical white space (16px or 24px) or a change from `surface` to `surface_container`.
*   **Textile Cards:** Feature the image as the hero. Use a 0.25rem (DEFAULT) corner radius for a sharp, professional look.

### Buttons
*   **Primary:** Solid `primary_container` (#e61e25) with `on_primary` text. No border. High-impact.
*   **Secondary:** `surface_container_highest` background with `on_surface` text.
*   **Tertiary/Ghost:** `on_surface` text with no background. Interaction is shown via a subtle `surface_variant` hover state.

### Input Fields
*   **Style:** Minimalist. No background color—only a "Ghost Border" on the bottom edge. When focused, the bottom border transitions to `primary` red.
*   **Labels:** Floating `label-sm` that remains visible above the input to maintain context.

### Chips (Curatorial Tags)
*   **Selection Chips:** Use `secondary_container` (#e4e2e1) for unselected and `primary` (#bd0015) with `on_primary` (#ffffff) for selected.
*   **Shape:** Use `full` (9999px) roundedness to contrast against the sharp-edged cards.

### Archive-Specific: The "Magnifier"
*   A bespoke component for textile viewing: A floating `surface_container_lowest` circle with a `backdrop-blur` and an `outline` at 10% opacity, used to zoom into weave patterns.

## 6. Do's and Don'ts

### Do
- **Do** prioritize large-scale imagery. The textile is the hero.
- **Do** use asymmetrical layouts (e.g., a wide 8-column content area next to a narrow 3-column metadata sidebar).
- **Do** use `primary` red sparingly for "Actionable Intel" and high-level navigation anchors.

### Don't
- **Don't** use 1px black or dark grey borders. They break the editorial flow.
- **Don't** use standard "Material Design" blue for links. Every interactive element must be Red, Grey, or Black.
- **Don't** crowd the interface. If the screen feels full, add 16px of padding to the containers.
- **Don't** use rounded corners larger than `xl` (0.75rem) for main containers; keep the aesthetic architectural and "crisp."
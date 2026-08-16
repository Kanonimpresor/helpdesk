# Documentation images

Screenshots and visual assets used by the README files (EN / ES / PT-PT) and the in-admin Guide / About tabs.

## Conventions

- **Format**: PNG preferred (lossless, transparent backgrounds when relevant); JPG only for photographic hero images.
- **Width**: 1200 px is the sweet spot — sharp on GitHub and rescales well on mobile.
- **Weight**: keep each file under 300 KB. Compress with [tinypng.com](https://tinypng.com) or [squoosh.app](https://squoosh.app) before committing.
- **Naming**: lowercase, kebab-case, English. Examples below.
- **Reference from README**: use **relative** paths so they work in any clone/mirror:
  ```markdown
  ![Admin Guide tab](docs/images/admin-guide.png)
  ```
  Never use absolute `https://github.com/...` URLs — they break on forks.

## Expected files

### Admin UI screenshots (BS3 admin theme)

| File | What it shows | Used in README section |
| ---- | ------------- | ---------------------- |
| `admin-dashboard.png`     | Admin → Booking → Dashboard (today's bookings, KPIs) | Overview |
| `admin-bookings-list.png` | Admin → Bookings list (filters, status badges) | Bookings |
| `admin-services.png`      | Admin → Services (CRUD list of bookable services) | Services |
| `admin-calendar.png`      | Admin → Calendar view | Calendar |
| `admin-availability.png`  | Admin → Settings → Availability tab (days/hours/holidays) | Configuration |
| `admin-payment.png`       | Admin → Settings → Payment tab (gateways, currency) | Payment |
| `admin-email.png`         | Admin → Settings → Email templates | Notifications |
| `admin-coupons.png`       | Admin → Coupons list | Coupons |
| `admin-clients.png`       | Admin → Clients list (with import/export buttons) | Import / Export |
| `admin-guide.png`         | Admin → Guide tab (in-admin documentation) | Documentation |
| `admin-about.png`         | Admin → About tab (author / version / links) | About / Author |

### Frontend screenshots (BS5 public booking flow)

Capture at 1200 × 800 px from the public booking page:

| File | What it shows |
| ---- | ------------- |
| `front-services.png`       | Service picker step |
| `front-calendar.png`       | Date + time slot picker |
| `front-form.png`           | Customer details form |
| `front-payment.png`        | Payment / coupon step |
| `front-confirmation.png`   | Confirmation screen |

### Optional hero / banner

| File | Purpose |
| ---- | ------- |
| `hero-collage.png` | A 2×3 collage of the most representative admin + front screens, used as the very first image at the top of the README under the badges. Optional but eye-catching. |
| `hero-live.png`    | A single beauty shot (admin dashboard or front booking flow) on a real device mockup. Optional alternative to the collage. |

---

> This `docs/images/` folder ships **empty** in v2.4.0. Drop screenshots here and reference them from the READMEs as you produce them — no code change needed. Same convention as `sitedown_styles`.

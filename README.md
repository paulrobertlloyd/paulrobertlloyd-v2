# v2.paulrobertlloyd.com

*My personal website. There are many like it, but this was mine (2011-2015).*

Originallly managed by [Movable Type](https://movabletype.org), this repo contains all the source files required to build the site using that software. Originally served using PHP, files in `www` have been rebuilt so they can be served as static HTML. Search results and tag archives relied on Movable Type’s internal CGI scripts, so these pages no longer work.

## Repo structure

```
v2.paulrobertlloyd.com
├── src             # SOURCE
|   ├── mtml        # Movable Type templates
|   ├── less        # LessCSS styles. Originally served from ./_less/
│   └── php         # PHP functions. Originally served from ./_php/
│
├── www             # COMPILED
│
├── .gitattributes  # Files tracked by Git LFS
├── netlify.toml    # Netlify configuration
└── README.md       # This file
```

© [Paul Robert Lloyd](https://paulrobertlloyd.com)

# Fat-free API Boilerplate
Fat-free framework API Boilerplate to make your life easier.

I really love to make  APIs so here's my basic API Standard.
Heavily inspired by Facebook API and my senpai's standard.

## Installed Instance:
- Falsum for debugging.
- Fat-free for the cure core of this boilerplate.
- Cortex for modelling (you could remove it easily, please see our manual (soon))

## Features
Better output standards. the `app/output/formatter.php` are responsible to make your outputs beautiful.
It's designed to be easily changed. The `app/output/auto.php` are the one responsible to choose whether it's XML or JSON output.

### API Standards
| Method            | URL                | Controller                       | Description                                         |
|-------------------|--------------------|----------------------------------|-----------------------------------------------------|
| GET               | /@module/@func     | Controller\@module->get_@func    | Usually i get listings of things by this method.    |
| POST              | /@module/@func     | Controller\@module->post_@func   | Usually i create object with this.                  |
| PUT (POST-like)   | /@module/@func     | Controller\@module->put_@func    | I update things here.                               |
| DELETE            | /@module/@func     | Controller\@module->delete_@func | I delete things here.                               |

**NOTE**: The `@func` is optional. When access `GET /@module`, it will invoke `Controller\@module->get_index` and etc. So it's important to know how todo things.

**NOTE**: Oh the future, i'll add the `Authorization` header required for API Key and etcs. Please bear with us.

## License
[MIT](LICENSE). You're allowed to use it as you like, but please consider to write our name and link to this repo on your API Document. Oh don't forget with the FatFreeFramework too!
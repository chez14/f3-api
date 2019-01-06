# Fat-free API Boilerplate
Fat-free framework API Boilerplate to make your life easier.

I really love to make  APIs so here's my basic API Standard.
Heavily inspired by Facebook API and my senpai's standard.

## Installed Instance:
- Fat-free for the cure core of this boilerplate.
- Cortex for modelling (you could remove it easily, please see our manual (soon))
- Ilgar for easy migrations.

## Features
Better output standards. the `app/output/formatter.php` are responsible to make your outputs beautiful.
It's designed to be easily changed. The `app/view/api.php` are the one responsible to choose whether it's XML or JSON output.

### API Standards
| Method            | URL                                         | Controller                        | Description                                         |
|-------------------|---------------------------------------------|-----------------------------------|-----------------------------------------------------|
| GET               | /@module/@func(.json \| .xml \| `null`)     | Controller\\@module->get_@func    | Usually i get listings of things by this method.    |
| POST              | /@module/@func(.json \| .xml \| `null`)     | Controller\\@module->post_@func   | Usually i create object with this.                  |
| PUT (POST-like)   | /@module/@func(.json \| .xml \| `null`)     | Controller\\@module->put_@func    | I update things here.                               |
| DELETE            | /@module/@func(.json \| .xml \| `null`)     | Controller\\@module->delete_@func | I delete things here.                               |

**NOTE**: The `@func` is optional. When access `GET /@module`, it will invoke `Controller\@module->get_index` and etc. So it's important to know how todo things.

**NOTE**: Oh the future, i'll add the `Authorization` header required for API Key and etcs. Please bear with us.

**SPECIAL**: You just need to add `?json_pretty_print` on the end of the URL if you wanted to pretty print the JSON. Have fun!

**WARNING**: When the extension is not defined, we'll treat them as JSON.

## Getting Started
- Invoke this:
    ```shell
    $ composer create-project chez14/f3-api my-api
    ```
- Do your own setup on `app/config/`
  
  find for `.example.ini` file, and change them as your system setups.

- Run the development server:
    ```shell
    $ composer run-script start --timeout=0
    ```
- Run a migration
    
  You can access `http://localhost:8080/-/migrate` to start the migration.
  
## License
[GPLv3](LICENSE).
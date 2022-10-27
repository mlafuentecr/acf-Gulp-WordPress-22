# client website

## 🌐 Project info

---

## 💻 LOCAL DEV ENVIRONMENT SETUP

### Set up the project with the free version of [Local](https://localwp.com/)

1. Open Local, and click on the **Add Local site** button.
2. Select the option to **Create a new site** without a Blueprint.
3. For the remaining configuration prompts set to the default/recommended options, and use the following values:
   - **Name:** client(dev)
   - If you prefer working in a specific folder, select a said location for the **Local site path** in the **Advanced options** section
   - **Environment:** Preferred
   - **Set up WordPress:**
     - You'll create a user that you'll use for a short period of time, just for logging in to your local version of the site until you migrate the site’s database, which will override all existing data, deleting this user. So just set it to something easy to remember, like the following example:
       - **Username:** admin
       - **Password:** admin
       - **E-mail:** use the example email or set it to a fake email
       - **Is this a WordPress Multisite?:** No

### Database migration

**In the Dev environment**

1. A WordPress admin that has access to the Dev Environment has to create a User for you and give you its credentials
2. [Log in to the Dev Environment]() using said credentials
3. On the `Left side menu` you'll find the **All-in-One WP Migration** plugin, go to `Export > Export to > File`. That will generate and download a `zip` file with all the content that's in the environment
4. Within the plugin's menu, go to `Backups` and clean up the back up that you just generated

**In your local environment**

1. Install the following plugin's PRO versions using the `zip` files provided by Mario. The process is as follows:
   1. Open your local site by going to the Local application and clicking on the `WP Admin` button
   2. Log in to your local site using the `admin/admin` temporary user that you created when setting up the local site
   3. Go to `Left side menu > Plugins > Add new`
   4. Click on the `Upload Plugin` button, and select the plugin's `zip` file
2. Go to `All-in-One WP Migration plugin menu > Import`
3. `Import from > File > Select the backup file downloaded previously`
4. We accept that the backup will override all content of our local site, and the process of uploading the database begins
5. After the process is done, we'll see changes in the Admin side of WordPress:
   - The `admin/admin` user we were using will stop working, we should log out and log back in with the user that was created for us in the `Dev` environment, using the same credentials
   - The `Left side menu` will have different options from what it had before

### Connecting the repo

The content of this repo will be included in what's retrieved with the database migration. You'll find it within the local site's folder:

1. Go to the Local app and click on the `Go to site folder` link
2. Within that folder, navigate to `app > public > wp-content > themes > client`, which is the root folder of this repo
3. Open a terminal in the `client` folder, and run:
   1. `git remote -v`:
      - If it doesn't list anything, then the repo is not connected, so run `git remote add origin `
      - If it lists `origin` with the right URL, then the repo is already connected
   2. Run `git fetch` to check if everything is up to date with the remote repo

### Install the necessary tools

[Gulp](https://gulpjs.com)'s CLI needs to be installed globally:

```
npm install --global gulp-cli
```

### Install the project's dependencies

Within the `client` folder, run:

```
npm install
```

## 🧑‍💻 LOCAL DEV WORKFLOW

1. To compile the bundles, start all the containers and leave them running in the background, run:

```
gulp
```

---

## 🎨 STYLES

```
* Sass to CSS conversion
* Merging media queries
* Error handling
* Auto-prefixing
* Minification
* Sourcemaps

```

## 🗃 Gulp

```
 To config variables in gulp open gulpfile.js
npm install --save-dev @babel/register @babel/core @babel/preset-env

 IF THERE IS ANY PROBLEM
 # Uninstall previous Gulp installation and related packages, if any
$ npm rm gulp -g
$ npm rm gulp-cli -g
$ cd [your-project-dir/]
$ npm rm gulp --save-dev
$ npm rm gulp --save
$ npm rm gulp --save-optional
$ npm cache clean # for npm < v5

# Install the latest Gulp CLI tools globally
# if you are on win run this as administrator
$ npm install --global gulp-cli

# Install Gulp 4 into your project as dev dependency
$ npm install gulp --save-dev

# RUN GULP OR npx gulp
$ npx gulp
```

## 🌋 wp

```
everything is handle by funtion.php and from there
 in the inc/function folder
```

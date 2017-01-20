## Sample Website with prismic.io & Laravel

This is an example website using the [Laravel framework](https://laravel.com/) with content managed from [prismic.io](https://prismic.io/) (API-based CMS).

To see this website example in action, just follow these instructions to get it up and running.

### Install the project

If you don't already have Laravel installed on your local machine you can view the [Laravel installation page](https://laravel.com/docs/5.3/installation) to get started.

After you download the project files, finish installing the project by running the following command in the project folder:

```
$ composer install
```

#### Add content on prismic.io

Before this project can be launched, you need to set up a prismic.io repository and add some content. To create a new prismic repository visit http://prismic.io/create.

##### Create custom types

You will first need to create three different custom types for this website project: Homepage, Page, and Menu.

Set up the **Homepage** custom type as a **Single Type**, and give it the name **"Homepage"**.

Set up the **Page** custom type as a **Repeatable Type**, and give it the name **"Page"**.

Set up the **Menu** custom type as a **Single Type**, and give it the name **"Menu"**.

The JSON for each of these custom types can be found in the custom_types folder of this project. For each custom type, simply copy and paste the code into the JSON editor and save.

##### Create content

Next go to the Content page of your repository and create some pages and a menu. For each document of the Page type, make sure to add a unique identifier that will be used for the page's url on the site.

##### Update the prismic.io endpoint

Next, update the prismic.io API endpoint in your project configurations. In config/prismic.php, update the following configuration with your repository's endpoint.

```
'url' => 'https://sample-website-test.prismic.io/api'
```

#### Launch the website

Now everything is in place to launch the project on your local machine. Run the following command from the project folder:

```
$ php artisan serve
```

### prismic.io specific project files

Here are the files of this project that are specific to connect this website to your prismic repository and load the content. 

##### config/prismic.php

You'll find the prismic configurations in config/prismic.php. Here's where you'll configure the API enpoint of your content repository and add the API access token if you configure your repository to have a private API.

##### app/LinkResolver.php

Here's where you can see the link resolver that will create the url paths for the website's pages.

##### app/Http/Middleware/ConnectToPrismic.php

This is the middleware that connects to the prismic API.

##### app/Providers/PrismicServiceProvider.php

The prismic service provider runs the prismic composer for all routes.

##### app/Http/ViewComposers/PrismicComposer.php

The prismic composer queries the website menu content and binds both the menu content and the link resolver to the view. 

##### resources/views

You can find the views for the website homepage and pages are found in the resources/views folder. 
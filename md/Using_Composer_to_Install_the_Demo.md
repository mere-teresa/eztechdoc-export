# Using Composer to Install the Demo

Besides a "clean" eZ Platform installation there is an option to install eZ Platform with demo content. Demo installation is prepared for the presentation of how eZ Platform works and handles the content using real life examples.

Installation of eZ Platform Demo is very similar to a standard "clean" installation. Demo provides some previously prepared content and is stored in a separate github repository - you can find it [here.](https://github.com/ezsystems/ezplatform-demo)

Installation requires Composer global installation. You can find more information about using Composer [here.](Using_Composer)

To perform eZ Platform demo installation use commands below in the terminal/bash/command-line interface. 

```
composer create-project --no-dev --keep-vcs ezsystems/ezplatform-demo
cd ezplatform-demo
  
php app/console ezplatform:install demo
```

Now you can check out the project structure and capabilities of the system.

It is not recommended to start your own project on demo installation.

 



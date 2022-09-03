<?php

/* @ author Denys Petrenko < Des . Petrenko @ gmail . com >
 */

class GenerateDb
{
    /**
     * @var
     */
    public $num;

    /**
     * @param $num
     */
    public function __invoke($num)
    {
        for ($i = 0; $i < $num; $i++) {
            require_once 'config.php';
            require_once '../vendor/autoload.php';
            $faker = Faker\Factory::create();

            $name = $faker->unique()->name();
            $pass = $faker->unique()->password();
            $email = $faker->unique()->email();
            $created_at = date("Y-m-d");
            $updated_at = date("Y-m-d");
            $gender = ['male', 'female', 'not known', 'Not applicable'];
            $randomGender = array_rand($gender, 1);
            $randKeys = array_rand($gender, 2);
            $nameGender = $gender[$randKeys[0]];
            echo $nameGender;

            $title = $faker->unique()->sentence();
            $description = $faker->unique()->sentence(10);


            $insertToUsers = getConnect()->query("INSERT INTO nix2.users (name, email, pass, created_at, updated_at, gender_id) VALUES
                                                                                     ('$name','$email', sha1('$pass'), '$created_at', '$updated_at',
                                                                                      (SELECT id FROM nix2.gender WHERE name = '$nameGender'))");

            var_dump($insertToUsers);

            $insertArticles = getConnect()->query("INSERT INTO nix2.articles (title, description, created_at, updated_at) VALUES
                                                                             ('$title', '$description',  '$created_at', '$updated_at');");
            echo "<br>";
            var_dump($insertArticles);
            $insertUserArcticlesToTableUA = getConnect()->query(" INSERT INTO nix2.users_articles (user_id, article_id)  VALUES
                                                              ((SELECT id FROM nix2.users WHERE name = '$name'),
                                                               (SELECT id FROM nix2.articles WHERE title = '$title'))");

            var_dump($insertUserArcticlesToTableUA);
        }
    }

}

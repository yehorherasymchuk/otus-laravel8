@servers(['web' => ['forge@172.104.135.144']])

@story('deploy')
  git
  composer
  tests
@endstory

@task('git', ['on' => 'web'])
  git clone --single-branch --branch YHerasymchuk/queues https://github.com/otusteamedu/Laravel
@endtask

@task('composer')
  composer install
@endtask

@task('tests')
  php vendor/bin/phpunit --testdox
@endtask

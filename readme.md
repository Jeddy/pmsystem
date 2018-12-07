# Laravel Project Init

快速开始一个 Laravel 项目


## Composer加速

```shell
composer config -g repo.packagist composer https://packagist.phpcomposer.com
```

## Clone仓库代码

```shell
git clone git@github.com:Jeddy/laravel-project-init.git
```

## 安装依赖

```shell
composer install
```

## 修改 /etc/hosts、配置站点、重启虚拟机：

```shell
192.168.10.10  test.test
```

## 配置站点 ~/Homestead/Homestead.yaml

```shell
sites:
    - map: test.test
      to: /home/vagrant/Code/laravel-project-init/public
```

## 重启虚拟机：

```shell
cd ~/Homestead && vagrant provision && vagrant reload
```

## 进入虚拟机项目根目录，生成并修改配置文件

```shell
cp .env.example .env
```

## 生成key

```shell
php artisan key:generate
```

## 前端优化，配置yarn加速

```shell
yarn config set registry https://registry.npm.taobao.org
```

## 使用yarn安装依赖

```shell
SASS_BINARY_SITE=http://npm.taobao.org/mirrors/node-sass yarn
```

## 编译&监听资源变化

```shell
npm run watch-poll
```


## License

[MIT license](https://opensource.org/licenses/MIT).

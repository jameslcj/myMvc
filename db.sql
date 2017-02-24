create table if not exists admin(
    id int unsigned not null primary key auto_increment comment '自增id',
    username varchar(252) not null default '' comment '用户名',
    password char(32) not null default '' comment '密码',
    register_time int(11) unsigned not null default 0 comment '注册时间'
);

create table if not exists data(
    id int unsigned not null primary key auto_increment comment '自增id',
    title varchar(30) not null default '' comment '标题',
    `desc` varchar(252) not null default '' comment '描述',
    `image` varchar(252) not null default '' comment '图片地址',
    add_time int(11) unsigned not null default 0 comment '注册时间'
);

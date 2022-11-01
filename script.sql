create table test.failed_jobs
(
    id         bigint unsigned auto_increment
        primary key,
    uuid       varchar(255)                          not null,
    connection text                                  not null,
    queue      text                                  not null,
    payload    longtext                              not null,
    exception  longtext                              not null,
    failed_at  timestamp default current_timestamp() not null,
    constraint failed_jobs_uuid_unique
        unique (uuid)
)
    collate = utf8mb4_unicode_ci;

create table test.migrations
(
    id        int unsigned auto_increment
        primary key,
    migration varchar(255) not null,
    batch     int          not null
)
    collate = utf8mb4_unicode_ci
    auto_increment = 51;

create table test.password_resets
(
    email      varchar(255) not null,
    token      varchar(255) not null,
    created_at timestamp    null
)
    collate = utf8mb4_unicode_ci;

create index password_resets_email_index
    on test.password_resets (email);

create table test.personal_access_tokens
(
    id             bigint unsigned auto_increment
        primary key,
    tokenable_type varchar(255)    not null,
    tokenable_id   bigint unsigned not null,
    name           varchar(255)    not null,
    token          varchar(64)     not null,
    abilities      text            null,
    last_used_at   timestamp       null,
    expires_at     timestamp       null,
    created_at     timestamp       null,
    updated_at     timestamp       null,
    constraint personal_access_tokens_token_unique
        unique (token)
)
    collate = utf8mb4_unicode_ci;

create index personal_access_tokens_tokenable_type_tokenable_id_index
    on test.personal_access_tokens (tokenable_type, tokenable_id);

create table test.tags
(
    id         bigint unsigned auto_increment
        primary key,
    name       varchar(255) not null,
    created_at timestamp    null,
    updated_at timestamp    null
)
    collate = utf8mb4_unicode_ci
    auto_increment = 3;

create table test.users
(
    id                bigint unsigned auto_increment
        primary key,
    name              varchar(255)                not null,
    email             varchar(255)                not null,
    email_verified_at timestamp                   null,
    password          varchar(255)                not null,
    role              varchar(255) default 'user' null,
    remember_token    varchar(100)                null,
    created_at        timestamp                   null,
    updated_at        timestamp                   null,
    constraint users_email_unique
        unique (email)
)
    collate = utf8mb4_unicode_ci
    auto_increment = 3;

create table test.cars
(
    id          bigint unsigned auto_increment
        primary key,
    user_id     bigint unsigned      not null,
    type        varchar(255)         not null,
    serie       varchar(255)         not null,
    carroserie  varchar(255)         not null,
    year        int                  not null,
    horsepower  int                  not null,
    information text                 null,
    image       varchar(255)         null,
    created_at  timestamp            null,
    updated_at  timestamp            null,
    status      tinyint(1) default 1 not null,
    constraint cars_user_id_foreign
        foreign key (user_id) references test.users (id)
            on update cascade on delete cascade
)
    collate = utf8mb4_unicode_ci
    auto_increment = 22;

create table test.car_tag
(
    id         bigint unsigned auto_increment
        primary key,
    car_id     bigint unsigned null,
    tag_id     bigint unsigned null,
    created_at timestamp       null,
    updated_at timestamp       null,
    constraint car_tag_car_id_foreign
        foreign key (car_id) references test.cars (id)
            on delete cascade,
    constraint car_tag_tag_id_foreign
        foreign key (tag_id) references test.tags (id)
            on delete cascade
)
    collate = utf8mb4_unicode_ci
    auto_increment = 14;





create database smart_wallet;

create table users (
    id SERIAL PRIMARY key , 
    first_name VARCHAR(50) NOT NULL ,
    last_name  VARCHAR(50) not null ,
    age int  NOT NULL ,
    email VARCHAR(150) NOT NULL UNIQUE,
    password VARCHAR(150) NOT null,
    status VARCHAR(20) DEFAULT 'active',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);


-- DROP Table users CASCADE;

INSERT INTO users(first_name ,last_name , age , email , password ) VALUES ('fakhrddine' , 'largou' , '19' , 'largou@gmail.com' , 'lalapapa' );

create table categories(
    id SERIAL primary key ,
    description VARCHAR(250) NOT null,
    category VARCHAR(100) not null,
    category_type VARCHAR(30) not null ,
    created_at TIMESTAMP DEFAULT  CURRENT_TIMESTAMP 
    
    );

create table cards (
    id SERIAL PRIMARY key,
    user_id int not null,
    rib VARCHAR(24) not null ,
    month int not null , 
    year int not null ,
    card_type VARCHAR(20) not null, 
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,

    CONSTRAINT fk_category_user_id  FOREIGN key (user_id) REFERENCES users(id)
)


DROP TABLE cards;


create table incomes(
    id SERIAL PRIMARY KEY,
    description VARCHAR(250) NULL,
    user_id int NOT null ,
    category_id int not null,
    card_id int not null,
    amount DECIMAL(10,2) NOT null ,
    created_at TIMESTAMP default CURRENT_TIMESTAMP,
    constraint fk_income_user_id FOREIGN KEY (user_id) REFERENCES users(id),
    CONSTRAINT fk_income_category_id FOREIGN KEY (category_id) REFERENCES categories(id),
    CONSTRAINT fk_income_card_id FOREIGN KEY (card_id) REFERENCES cards(id)
)

create table expenses(
    id SERIAL PRIMARY KEY,
    description VARCHAR(250) NULL,
    user_id int NOT null ,
    category_id int not null,
    card_id int not null,
    amount DECIMAL(10,2) NOT null ,
    created_at TIMESTAMP default CURRENT_TIMESTAMP,
    constraint fk_income_user_id FOREIGN KEY (user_id) REFERENCES users(id),
    CONSTRAINT fk_income_category_id FOREIGN KEY (category_id) REFERENCES categories(id),
    CONSTRAINT fk_income_card_id FOREIGN KEY (card_id) REFERENCES cards(id)
)

# Guia do Desenvolvedor

# Banco de Dados
## Modelo Lógico do DATABASE feito no MySQL Workbench.

![Modelo-logico-InkWizards](/database/Workbench/tatuadores.png)



## Modelo Físico do DATABASE feito com phpmyadmin.

### Criando banco de dados

```sql
CREATE DATABASE InkWizards CHARACTER SET utf8mb4;
```

### Criando tabelas do database

#### Tatuadores

```sql
CREATE TABLE tatuadores(
    id TINYINT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    nome VARCHAR(30) NOT NULL,
    descricao TEXT(500) NOT NULL,
    localizacao VARCHAR(150) NOT NULL,
    contato VARCHAR(50) NOT NULL
);
```

#### Portfólio
```sql
CREATE TABLE portfolio(
    id TINYINT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    imagem BLOB NOT NULL,
    descricao TEXT(500) NOT NULL,
    tatuador_id TINYINT NOT NULL
);    
```

### Adicionando Foreign Key das tabelas
```sql
ALTER TABLE portfolio
    ADD CONSTRAINT fk_portfolio_tatuadores
    FOREIGN KEY (tatuador_id) REFERENCES  
```


# Back-End



# Front-End


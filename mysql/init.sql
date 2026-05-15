CREATE TABLE IF NOT EXISTS tbCarro (
    id INT AUTO_INCREMENT PRIMARY KEY,
    modelo VARCHAR(100),
    cor VARCHAR(50),
    valor DECIMAL(10,2),
    fabricante VARCHAR(100),
    anoFabricacao INT
);

INSERT INTO tbCarro (modelo, cor, valor, fabricante, anoFabricacao)
VALUES
('Civic', 'Preto', 120000.00, 'Honda', 2022),
('Corolla', 'Branco', 130000.00, 'Toyota', 2023);
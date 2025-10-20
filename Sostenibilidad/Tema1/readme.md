# 🏘️ Viviendas por Intensidad de Uso - Madrid 2021

> Análisis de consumo eléctrico en viviendas de la Comunidad de Madrid



## 🎯 Lector de CSV en JAVA

### Problema

Analizar datos de consumo eléctrico en viviendas de la Comunidad de Madrid (2021) para identificar los **3 municipios con mayor mediana de consumo anual**.

### Objetivo

Extraer y mostrar:
- 📍 **Territorio** (municipio)
- 📊 **Valor** (mediana de consumo anual)
- 🔢 **Código** (identificador del municipio)

---

## 🛠️ Tecnologías utilizadas

| Tecnología | Uso |
|------------|-----|
| **Java 8+** | Lenguaje principal |
| **BufferedReader** | Lectura eficiente de archivos |
| **Collections** | Estructuras de datos (ArrayList, List) |
| **Algoritmos propios** | Filtrado, ordenamiento y procesamiento |

---

## 📋 Flujo del Programa

### 1️⃣ Lectura del CSV

El programa lee el archivo línea por línea usando `BufferedReader` y separa los valores con `;`.

```java
String csvFile = "ciudades.csv";
List<List<String>> data = new ArrayList<>();

try (BufferedReader br = new BufferedReader(new FileReader(csvFile))) {
    String line;
    while ((line = br.readLine()) != null) {
        String[] values = line.split(";");
        List<String> lineData = Arrays.asList(values);
        data.add(lineData);
    }
} catch (IOException e) {
    e.printStackTrace();
}
```

**¿Qué hace?** Convierte cada fila del CSV en una lista y las almacena en una estructura `List<List<String>>`.

---

### 2️⃣ Limpieza de Datos

Eliminamos la cabecera y filtramos filas con valores inválidos (`-`) en la columna de mediana.

```java
if (data.size() > 0) {
    data.remove(0); // Eliminar cabecera
}

for (int i = 0; i < data.size(); i++) {
    List<String> row = data.get(i);
    if (row.size() > 4 && row.get(4).contains("-")) {
        data.remove(i);
        i--; // Ajustar índice tras eliminación
    }
}
```

**¿Por qué?** Aseguramos trabajar solo con datos válidos para el análisis.

---

### 3️⃣ Ordenamiento

Ordenamos las filas de **mayor a menor** según la mediana de consumo (columna 4).

```java
for (int i = 0; i < data.size() - 1; i++) {
    for (int j = i + 1; j < data.size(); j++) {
        double numero1 = Double.parseDouble(data.get(i).get(4));
        double numero2 = Double.parseDouble(data.get(j).get(4));
        
        if (numero2 > numero1) {
            List<String> temp = data.get(i);
            data.set(i, data.get(j));
            data.set(j, temp);
        }
    }
}
```

**Algoritmo:** Bubble Sort adaptado para comparar valores numéricos.

---

### 4️⃣ Extracción de Resultados

Imprimimos los 3 municipios con mayor consumo.

```java
for (int i = 0; i < 3; i++) {
    List<String> row = data.get(i);
    if (row.size() > 5) {
        String territorio = row.get(3);
        String valor = row.get(4);
        String codigo = row.get(5);
        System.out.println(territorio + ", " + valor + ", " + codigo);
    }
}
```

---

## 📊 Ejemplo de Salida

```
Municipio A, 5420.5, 28001
Municipio B, 5318.2, 28002
Municipio C, 5205.8, 28003
```

---

## 🚀 Cómo Ejecutar

```bash
java csv.java
```

El programa procesará el CSV y mostrará los 3 municipios con mayor mediana de consumo eléctrico. (El .csv debe estar en la misma carpeta que el .java) 

---

## 💡 Por Qué Este Proyecto

Este proyecto destaca por:

✅ **Procesamiento de datos reales** sin dependencias externas  
✅ **Código limpio y comprensible** usando solo Java  
✅ **Aplicación práctica** de estructuras de datos 

Refleja mi capacidad para:
- Analizar y resolver problemas del mundo real
- Manipular y transformar datos de forma eficiente
- Escribir código mantenible y bien estructurado

---

<div align="center">

**Hecho por César Rodríguez**

</div>

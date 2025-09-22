import java.io.BufferedReader;
import java.io.FileReader;
import java.io.IOException;
import java.util.ArrayList;
import java.util.Arrays;
import java.util.List;

public class csv {
    public static void main(String[] args) {
        String csvFile = "ciudades.csv";
        List<List<String>> data = new ArrayList<>();
        
        try (BufferedReader br = new BufferedReader(new FileReader(csvFile))) {
            String line;
            while ((line = br.readLine()) != null) {
                String[] values = line.split(";");
                List<String> lineData = Arrays.asList(values);
                data.add(lineData);
            }
            
            // Eliminar la primera fila
            if (data.size() > 0) {
                data.remove(0);
            }
            
            // Eliminar filas que tienen "-" en c4
            for (int i = 0; i < data.size(); i++) {
                List<String> row = data.get(i);
                if (row.size() > 4 && row.get(4).contains("-")) {
                    data.remove(i);
                    i--;
                }
            }
            
            // Ordenar de mayor a menor por c4
            for (int i = 0; i < data.size() - 1; i++) {
                for (int j = i + 1; j < data.size(); j++) {
                    double numero1 = Double.parseDouble(data.get(i).get(4));
                    double numero2 = Double.parseDouble(data.get(j).get(4));
                    
                    // Compàrar numeros anteriores y sustituir
                    if (numero2 > numero1) {
                        List<String> temp = data.get(i);
                        data.set(i, data.get(j));
                        data.set(j, temp);
                    }
                }
            }
            
            //Los 3 mas altos
            for (int i = 0; i < 3; i++) {
                List<String> row = data.get(i);
                if (row.size() > 5) {
                    String c3 = row.get(3);
                    String c4 = row.get(4);
                    String c5 = row.get(5);
                    System.out.println(c3 + ", " + c4 + ", " + c5);
                }
            }
            
        } catch (IOException e) {
            System.err.println("Error al leer : " + e.getMessage());
            e.printStackTrace();
        }
    }
}
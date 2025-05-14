#include <iostream>
#include <vector>
#include <string>
#include <algorithm>
#include <random>

using namespace std;

int main() {
    int n;
    cout << "Cuantos participantes deseas ingresar? ";
    cin >> n;

    vector<string> nombres;
    vector<int> numeros;

    cin.ignore(); // limpiar buffer

    // Ingresar nombres
    for (int i = 0; i < n; ++i) {
        string nombre;
        cout << "Ingresa el nombre #" << (i + 1) << ": ";
        getline(cin, nombre);
        nombres.push_back(nombre);
    }

    // Ingresar numeros unicos
    for (int i = 0; i < n; ++i) {
        int numero;
        cout << "Ingresa el numero #" << (i + 1) << ": ";
        cin >> numero;
        numeros.push_back(numero);
    }

    // Mezclar numeros con shuffle moderno
    random_device rd;
    mt19937 g(rd());
    shuffle(numeros.begin(), numeros.end(), g);

    // Mostrar resultado del sorteo
    cout << "\nResultado del sorteo:\n";
    for (int i = 0; i < n; ++i) {
        cout << nombres[i] << " => " << numeros[i] << endl;
    }

    return 0;
}

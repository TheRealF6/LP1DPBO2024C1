#include <iostream>
#include <vector>
#include <iomanip>
#include "DPR.cpp"

using namespace std;

void showData(const vector<DPR>& anggota_dpr) {
    cout << "+-----+--------------------+---------------------+------------------------+" << endl;
    cout << "| ID  |        Nama        |        Bidang       |         Partai         |" << endl;
    cout << "+-----+--------------------+---------------------+------------------------+" << endl;
    for (const auto& member : anggota_dpr) {
        cout << "| " << left << setw(3) << member.get_id() << " | " << setw(18) << member.get_nama() << " | " << setw(19) << member.get_bidang() << " | " << setw(22) << member.get_partai() << " |" << endl;
    }
    cout << "+-----+--------------------+---------------------+------------------------+" << endl;
}

void addData(vector<DPR>& anggota_dpr) {
    int new_id;
    string new_nama, new_bidang, new_partai;
    cout << "Masukkan ID: ";
    cin >> new_id;
    cin.ignore(); // Membuang newline character dari buffer
    cout << "Masukkan nama: ";
    getline(cin, new_nama);
    cout << "Masukkan bidang: ";
    getline(cin, new_bidang);
    cout << "Masukkan partai: ";
    getline(cin, new_partai);
    anggota_dpr.push_back(DPR(new_id, new_nama, new_bidang, new_partai));
    cout << "Data anggota berhasil ditambah." << endl;
}

void modifyData(vector<DPR>& anggota_dpr) {
    int id_to_edit;
    cout << "Masukkan ID anggota yang ingin diubah: ";
    cin >> id_to_edit;
    cin.ignore(); // Membuang newline character dari buffer
    string new_nama, new_bidang, new_partai;
    cout << "Masukkan nama baru: ";
    getline(cin, new_nama);
    cout << "Masukkan bidang baru: ";
    getline(cin, new_bidang);
    cout << "Masukkan partai baru: ";
    getline(cin, new_partai);
    for (auto& member : anggota_dpr) {
        if (member.get_id() == id_to_edit) {
            member.set_nama(new_nama);
            member.set_bidang(new_bidang);
            member.set_partai(new_partai);
            cout << "Data anggota berhasil diubah." << endl;
            return;
        }
    }
    cout << "ID anggota tidak ditemukan." << endl;
}

void deleteData(vector<DPR>& anggota_dpr) {
    int id_to_delete;
    cout << "Masukkan ID anggota yang ingin dihapus: ";
    cin >> id_to_delete;
    for (auto it = anggota_dpr.begin(); it != anggota_dpr.end(); ) {
        if (it->get_id() == id_to_delete) {
            it = anggota_dpr.erase(it);
            cout << "Data anggota berhasil dihapus." << endl;
            return;
        } else {
            ++it;
        }
    }
    cout << "ID anggota tidak ditemukan." << endl;
}

int main() {
    cout << "Selamat datang di Program Manajemen Anggota DPR" << endl;

    vector<DPR> anggota_dpr;

    // Menambahkan anggota awal
    anggota_dpr.push_back(DPR(1, "Budi", "Ketua", "Partai_Sosialis"));
    anggota_dpr.push_back(DPR(2, "Andi", "Wakil_Ketua", "Partai_Buruh"));
    anggota_dpr.push_back(DPR(3, "Tono", "Sekretaris", "Partai Konservatif"));
    anggota_dpr.push_back(DPR(4, "Joni", "Bendahara", "Partai_Liberal"));

    // Menampilkan semua anggota
    showData(anggota_dpr);

    string command;
    while (command != "CLOSE") {
        cout << "\nMasukkan perintah (SHOW, ADD, MODIFY, DELETE, CLOSE): ";
        getline(cin, command);

        if (command == "SHOW") {
            showData(anggota_dpr);
        } else if (command == "ADD") {
            addData(anggota_dpr);
        } else if (command == "MODIFY") {
            modifyData(anggota_dpr);
        } else if (command == "DELETE") {
            deleteData(anggota_dpr);
        } else if (command != "CLOSE") {
            cout << "Perintah tidak valid." << endl;
        }
    }

    cout << "Program ditutup. Terima kasih!" << endl;

    return 0;
}

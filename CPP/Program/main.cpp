#include <bits/stdc++.h>
#include "DPR.cpp"

using namespace std;

int main()
{
    DPR Budi(1, "Budi", "Ketua", "Partai_Sosialis");
    DPR Andi(2, "Andi", "Wakil_Ketua", "Partai_Buruh");
    DPR Tono(3, "Tono", "Sekretaris", "Partai Konservatif");
    DPR Joni(4, "Joni", "Bendahara", "Partai_Liberal");

    cout << '\n' << "Data anggota DPR : " << '\n';
    cout << Budi.get_id() << ". " << Budi.get_nama() << " | " << Budi.get_bidang() << " | " << Budi.get_partai() << '\n';
    cout << Andi.get_id() << ". " << Andi.get_nama() << " | " << Andi.get_bidang() << " | " << Andi.get_partai() << '\n';
    cout << Tono.get_id() << ". " << Tono.get_nama() << " | " << Tono.get_bidang() << " | " << Tono.get_partai() << '\n';
    cout << Joni.get_id() << ". " << Joni.get_nama() << " | " << Joni.get_bidang() << " | " << Joni.get_partai() << '\n';

    return 0;
}
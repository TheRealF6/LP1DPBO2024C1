#include <iostream>
#include <string>

using namespace std;

class DPR
{
    private:
        int id;
        string nama;
        string bidang;
        string partai;

    public:
        DPR()
        {
            this->id = 0;
            this->nama = "";
            this->bidang = "";
            this->partai = "";
        }

        DPR(int id, string nama, string bidang, string partai)
        {
            this->id = id;
            this->nama = nama;
            this->bidang = bidang;
            this->partai = partai;;
        }

        int get_id()
        {
            return this->id;
        }

        void set_id(int id)
        {
            this->id = id;
        }

        string get_nama()
        {
            return this->nama;
        }

        void set_nama(string nama)
        {
            this->nama = nama;
        }

        string get_bidang()
        {
            return this->bidang;
        }

        void set_bidang(string bidang)
        {
            this->bidang = bidang;
        }

        string get_partai()
        {
            return this->partai;
        }

        void set_partai(string partai)
        {
            this->partai = partai;
        }

        ~DPR()
        {
            
        }
};
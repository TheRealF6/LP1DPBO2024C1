from DPR import DPR

def show_data(anggota_dpr):
    # Menetapkan panjang awal untuk setiap kolom
    id_width = 2  # Panjang awal untuk kolom ID
    nama_width = 4  # Panjang awal untuk kolom Nama
    bidang_width = 6  # Panjang awal untuk kolom Bidang
    partai_width = 6  # Panjang awal untuk kolom Partai

    # Mengupdate panjang kolom berdasarkan isi tabel
    for member in anggota_dpr:
        id_width = max(id_width, len(str(member.id)))
        nama_width = max(nama_width, len(member.nama))
        bidang_width = max(bidang_width, len(member.bidang))
        partai_width = max(partai_width, len(member.partai))

    # Mencetak header tabel
    print("+-{}-+-{}-+-{}-+-{}-+".format('-'*id_width, '-'*nama_width, '-'*bidang_width, '-'*partai_width))
    print("| {:<{}} | {:<{}} | {:<{}} | {:<{}} |".format("ID", id_width, "Nama", nama_width, "Bidang", bidang_width, "Partai", partai_width))
    print("+-{}-+-{}-+-{}-+-{}-+".format('-'*id_width, '-'*nama_width, '-'*bidang_width, '-'*partai_width))

    # Mencetak baris data
    for member in anggota_dpr:
        print("| {:<{}} | {:<{}} | {:<{}} | {:<{}} |".format(member.id, id_width, member.nama, nama_width, member.bidang, bidang_width, member.partai, partai_width))

    # Mencetak garis bawah tabel
    print("+-{}-+-{}-+-{}-+-{}-+".format('-'*id_width, '-'*nama_width, '-'*bidang_width, '-'*partai_width))


def add_data(anggota_dpr):
    new_id = int(input("Masukkan ID: "))
    new_nama = input("Masukkan nama: ")
    new_bidang = input("Masukkan bidang: ")
    new_partai = input("Masukkan partai: ")
    anggota_dpr.append(DPR(new_id, new_nama, new_bidang, new_partai))
    print("Data anggota berhasil ditambah.")

def modify_data(anggota_dpr):
    id_to_edit = int(input("Masukkan ID anggota yang ingin diubah: "))
    new_nama = input("Masukkan nama baru: ")
    new_bidang = input("Masukkan bidang baru: ")
    new_partai = input("Masukkan partai baru: ")
    for member in anggota_dpr:
        if member.id == id_to_edit:
            member.nama = new_nama
            member.bidang = new_bidang
            member.partai = new_partai
            print("Data anggota berhasil diubah.")
            return
    print("ID anggota tidak ditemukan.")

def delete_data(anggota_dpr):
    id_to_delete = int(input("Masukkan ID anggota yang ingin dihapus: "))
    for member in anggota_dpr:
        if member.id == id_to_delete:
            anggota_dpr.remove(member)
            print("Data anggota berhasil dihapus.")
            return
    print("ID anggota tidak ditemukan.")

if __name__ == "__main__":
    print("Selamat datang di Program Manajemen Anggota DPR")

    anggota_dpr = [
        DPR(1, "Budi", "Ketua", "Partai_Sosialis"),
        DPR(2, "Andi", "Wakil_Ketua", "Partai_Buruh"),
        DPR(3, "Tono", "Sekretaris", "Partai Konservatif"),
        DPR(4, "Joni", "Bendahara", "Partai_Liberal")
    ]

    show_data(anggota_dpr)

    command = ""
    while command != "CLOSE":
        command = input("\nMasukkan perintah (SHOW, ADD, MODIFY, DELETE, CLOSE): ").upper()

        if command == "SHOW":
            show_data(anggota_dpr)
        elif command == "ADD":
            add_data(anggota_dpr)
        elif command == "MODIFY":
            modify_data(anggota_dpr)
        elif command == "DELETE":
            delete_data(anggota_dpr)
        elif command != "CLOSE":
            print("Perintah tidak valid.")

    print("Program ditutup. Terima kasih!")

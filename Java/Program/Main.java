import java.util.ArrayList;
import java.util.Scanner;

public class Main {
    static void showData(ArrayList<DPR> anggotaDPR) {
        int idWidth = 2, namaWidth = 4, bidangWidth = 6, partaiWidth = 6;

        for (DPR member : anggotaDPR) {
            idWidth = Math.max(idWidth, String.valueOf(member.getId()).length());
            namaWidth = Math.max(namaWidth, member.getNama().length());
            bidangWidth = Math.max(bidangWidth, member.getBidang().length());
            partaiWidth = Math.max(partaiWidth, member.getPartai().length());
        }

        System.out.println("+-" + "-".repeat(idWidth) + "-+-" + "-".repeat(namaWidth) + "-+-" + "-".repeat(bidangWidth) + "-+-" + "-".repeat(partaiWidth) + "-+");
        System.out.printf("| %-" + idWidth + "s | %-" + namaWidth + "s | %-" + bidangWidth + "s | %-" + partaiWidth + "s |\n", "ID", "Nama", "Bidang", "Partai");
        System.out.println("+-" + "-".repeat(idWidth) + "-+-" + "-".repeat(namaWidth) + "-+-" + "-".repeat(bidangWidth) + "-+-" + "-".repeat(partaiWidth) + "-+");

        for (DPR member : anggotaDPR) {
            System.out.printf("| %-" + idWidth + "d | %-" + namaWidth + "s | %-" + bidangWidth + "s | %-" + partaiWidth + "s |\n", member.getId(), member.getNama(), member.getBidang(), member.getPartai());
        }

        System.out.println("+-" + "-".repeat(idWidth) + "-+-" + "-".repeat(namaWidth) + "-+-" + "-".repeat(bidangWidth) + "-+-" + "-".repeat(partaiWidth) + "-+");
    }

    static void addData(ArrayList<DPR> anggotaDPR) {
        Scanner scanner = new Scanner(System.in);
        System.out.print("Masukkan ID: ");
        int newId = scanner.nextInt();
        scanner.nextLine();
        System.out.print("Masukkan nama: ");
        String newNama = scanner.nextLine();
        System.out.print("Masukkan bidang: ");
        String newBidang = scanner.nextLine();
        System.out.print("Masukkan partai: ");
        String newPartai = scanner.nextLine();
        anggotaDPR.add(new DPR(newId, newNama, newBidang, newPartai));
        System.out.println("Data anggota berhasil ditambah.");
    }

    static void modifyData(ArrayList<DPR> anggotaDPR) {
        Scanner scanner = new Scanner(System.in);
        System.out.print("Masukkan ID anggota yang ingin diubah: ");
        int idToEdit = scanner.nextInt();
        scanner.nextLine();
        System.out.print("Masukkan nama baru: ");
        String newNama = scanner.nextLine();
        System.out.print("Masukkan bidang baru: ");
        String newBidang = scanner.nextLine();
        System.out.print("Masukkan partai baru: ");
        String newPartai = scanner.nextLine();
        
        boolean found = false;
        for (DPR member : anggotaDPR) {
            if (member.getId() == idToEdit) {
                member.setNama(newNama);
                member.setBidang(newBidang);
                member.setPartai(newPartai);
                System.out.println("Data anggota berhasil diubah.");
                found = true;
                break; // Keluar dari loop setelah menemukan anggota dengan ID yang sesuai
            }
        }
        if (!found) {
            System.out.println("ID anggota tidak ditemukan.");
        }
    }    

    static void deleteData(ArrayList<DPR> anggotaDPR) {
        Scanner scanner = new Scanner(System.in);
        System.out.print("Masukkan ID anggota yang ingin dihapus: ");
        int idToDelete = scanner.nextInt();
        for (int i = 0; i < anggotaDPR.size(); i++) {
            if (anggotaDPR.get(i).getId() == idToDelete) {
                anggotaDPR.remove(i);
                System.out.println("Data anggota berhasil dihapus.");
                return;
            }
        }
        System.out.println("ID anggota tidak ditemukan.");
    }

    public static void main(String[] args) {
        System.out.println("Selamat datang di Program Manajemen Anggota DPR");

        ArrayList<DPR> anggotaDPR = new ArrayList<>();
        anggotaDPR.add(new DPR(1, "Budi", "Ketua", "Partai_Sosialis"));
        anggotaDPR.add(new DPR(2, "Andi", "Wakil_Ketua", "Partai_Buruh"));
        anggotaDPR.add(new DPR(3, "Tono", "Sekretaris", "Partai Konservatif"));
        anggotaDPR.add(new DPR(4, "Joni", "Bendahara", "Partai_Liberal"));

        showData(anggotaDPR);

        Scanner scanner = new Scanner(System.in);
        String command;
        do {
            System.out.print("\nMasukkan perintah (SHOW, ADD, MODIFY, DELETE, CLOSE): ");
            command = scanner.nextLine().toUpperCase();
            switch (command) {
                case "SHOW":
                    showData(anggotaDPR);
                    break;
                case "ADD":
                    addData(anggotaDPR);
                    break;
                case "MODIFY":
                    modifyData(anggotaDPR);
                    break;
                case "DELETE":
                    deleteData(anggotaDPR);
                    break;
                case "CLOSE":
                    break;
                default:
                    System.out.println("Perintah tidak valid.");
            }
        } while (!command.equals("CLOSE"));

        System.out.println("Program ditutup. Terima kasih!");
    }
}

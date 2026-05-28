import { Noto_Serif_JP } from "next/font/google";
import "./globals.css";
import Navbar from "@/components/Navbar";

const notoSerif = Noto_Serif_JP({
  subsets: ["latin"],
  weight: ["400", "700"],
  variable: "--font-serif",
});

export const metadata = {
  title: "歴史年表 Parallel",
  description: "日本史と世界史を並列に見る学習アプリ",
};

export default function RootLayout({
  children,
}: {
  children: React.ReactNode;
}) {
  return (
    <html lang="ja">
      <body className={`${notoSerif.variable} font-serif bg-[#EFDDD5]`}>
        <Navbar />
        {children}
      </body>
    </html>
  );
}

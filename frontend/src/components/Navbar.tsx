"use client";

import { useState, useEffect } from "react";
import { useRouter, usePathname } from "next/navigation";
import Link from "next/link";
import { getRegions } from "@/lib/api";

export default function Navbar() {
  const router = useRouter();
  const pathname = usePathname();
  const [regions, setRegions] = useState<{ id: number; name: string }[]>([]);

  useEffect(() => {
    getRegions().then(setRegions).catch(console.error);
  }, []);

  return (
    <nav className="sticky top-0 z-50 bg-[#EFDDD5]/95 border-b border-[#482019]/20 shadow-sm font-serif backdrop-blur-md">
      <div className="max-w-7xl mx-auto px-2 md:px-4">
        <div className="flex flex-col md:flex-row justify-between items-center py-2 md:h-16 gap-2 md:gap-4">
          <Link href="/" className="flex items-center">
            <span className="text-lg md:text-2xl font-black tracking-tighter text-[#482019] whitespace-nowrap">
              歴史年表 PARALLEL
            </span>
          </Link>

          <div className="flex items-center gap-3 md:gap-8">
            <Link
              href="/"
              className={`text-sm md:text-base font-bold whitespace-nowrap transition-colors ${
                pathname === "/"
                  ? "text-[#CF7F72] border-b-2 border-[#CF7F72]"
                  : "text-[#482019]"
              }`}
            >
              時代別
            </Link>

            <div className="flex items-center gap-1 bg-white/30 rounded-lg px-2 py-1 border border-[#482019]/10">
              <span className="text-[10px] opacity-60 uppercase font-bold hidden sm:inline">
                Region
              </span>
              <select
                onChange={(e) => router.push(`/region/${e.target.value}`)}
                className="bg-transparent text-xs md:text-sm font-bold outline-none cursor-pointer text-[#482019] max-w-[100px]"
                value={
                  pathname.startsWith("/region/") ? pathname.split("/")[2] : ""
                }
              >
                <option value="" disabled>
                  地域別
                </option>
                {regions.map((region) => (
                  <option key={region.id} value={region.id}>
                    {region.name}
                  </option>
                ))}
              </select>
            </div>
          </div>
        </div>
      </div>
    </nav>
  );
}

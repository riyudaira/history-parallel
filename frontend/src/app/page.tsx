"use client";

import { useState, useEffect } from "react";
import { getEventsByPeriod } from "@/lib/api";
import { RegionData } from "@/types/history";

export default function EraSearchPage() {
  const [selectedPeriod, setSelectedPeriod] = useState("19");
  const [displayedPeriod, setDisplayedPeriod] = useState("19");
  const [data, setData] = useState<RegionData[]>([]);
  const [loading, setLoading] = useState(false);
  const [activeTab, setActiveTab] = useState(0);
  const periods = [
    { label: "紀元前 5000年〜", value: "BC5000" },
    { label: "紀元前 3000年〜", value: "BC3000" },
    { label: "紀元前 1000年〜1年", value: "BC1000" },
    ...Array.from({ length: 20 }, (_, i) => ({
      label: `${i + 1} 世紀`,
      value: `${i + 1}`,
    })),
  ];

  useEffect(() => {
    let isMounted = true;
    const fetchData = async () => {
      setLoading(true);
      try {
        const result = await getEventsByPeriod(displayedPeriod);
        if (isMounted) setData(result);
      } catch (error) {
        console.error("Fetch error:", error);
      } finally {
        if (isMounted) setLoading(false);
      }
    };
    fetchData();
    return () => {
      isMounted = false;
    };
  }, [displayedPeriod]);

  return (
    <div className="min-h-screen bg-[#EFDDD5] text-[#482019] font-serif">
      <div className="py-6 md:py-8 text-center bg-white/20 border-b border-[#482019]/5">
        <div className="inline-flex items-center gap-2 md:gap-4 bg-[#EFDDD5] p-2 md:p-3 rounded-full shadow-inner border border-[#482019]/10 max-w-[95%]">
          <select
            value={selectedPeriod}
            onChange={(e) => setSelectedPeriod(e.target.value)}
            className="bg-transparent text-sm md:text-lg font-bold px-2 md:px-4 outline-none border-b border-[#482019] cursor-pointer"
          >
            {periods.map((p) => (
              <option key={p.value} value={p.value}>
                {p.label}
              </option>
            ))}
          </select>
          <button
            onClick={() => {
              setDisplayedPeriod(selectedPeriod);
              setActiveTab(0);
            }}
            className="bg-[#482019] text-[#EFDDD5] px-5 md:px-8 py-1.5 md:py-2 rounded-full font-bold hover:bg-[#CF7F72] transition-colors shadow-md whitespace-nowrap text-sm md:text-base"
          >
            表示
          </button>
        </div>
      </div>

      {!loading && data.length > 0 && (
        <div className="md:hidden flex overflow-x-auto bg-[#482019]/5 border-b border-[#482019]/10 sticky top-0 z-30 backdrop-blur-md">
          {data.map((region, index) => (
            <button
              key={region.region_id}
              onClick={() => setActiveTab(index)}
              className={`flex-none px-5 py-3 text-sm font-bold transition-all whitespace-nowrap ${
                activeTab === index
                  ? "bg-[#CF7F72] text-white shadow-inner"
                  : "text-[#482019]/60"
              }`}
            >
              {region.region_name}
            </button>
          ))}
        </div>
      )}

      <main className="w-full">
        {loading ? (
          <div className="text-center py-20 italic animate-pulse text-[#482019]/60">
            古文書を読み解いています...
          </div>
        ) : (
          <div className="overflow-x-auto">
            <div className="flex flex-nowrap">
              {data.map((region, index) => (
                <section
                  key={region.region_id}
                  className={`w-full md:w-[350px] md:min-w-[350px] flex flex-col border-r border-[#482019]/10 last:border-none
                    ${activeTab === index ? "flex" : "hidden md:flex"}`}
                >
                  <div className="sticky top-0 bg-[#E8D3C9] z-20 py-4 border-b-2 border-[#482019] shadow-md">
                    <h2 className="text-lg md:text-xl font-black text-center px-4 tracking-tighter">
                      {region.region_name}
                    </h2>
                  </div>

                  <div className="p-6 md:p-8 relative min-h-[60vh]">
                    <div className="absolute left-8 top-0 bottom-0 w-[3px] bg-[#CF7F72]/40 shadow-inner" />

                    <div className="space-y-12">
                      {region.events.map((event) => (
                        <article
                          key={event.id}
                          className="relative pl-12 group mb-12"
                        >
                          <div className="absolute left-[-15px] top-1.5 w-6 h-6 bg-[#CF7F72] rounded-full border-4 border-[#EFDDD5] shadow-sm group-hover:bg-[#482019] transition-colors" />

                          <header>
                            <span className="text-sm md:text-base font-bold text-[#CF7F72] border-b border-[#CF7F72]/30 inline-block mb-1">
                              {event.year > 0
                                ? `AD ${event.year}`
                                : `BC ${Math.abs(event.year)}`}
                              年
                              {event.era_name && (
                                <span className="ml-2 text-[#482019]/50 italic text-xs md:text-sm">
                                  ({event.era_name})
                                </span>
                              )}
                            </span>
                            <h3 className="text-lg md:text-xl font-bold leading-tight text-[#482019] group-hover:translate-x-1 transition-transform">
                              {event.title}
                            </h3>
                          </header>

                          <p className="text-sm md:text-[15px] mt-3 leading-relaxed text-[#482019]/90 text-justify bg-white/20 p-4 rounded-sm border-l-2 border-[#CF7F72]/20">
                            {event.description}
                          </p>
                        </article>
                      ))}

                      {region.events.length === 0 && (
                        <div className="text-center py-20 opacity-30 italic text-sm">
                          この時代の記録はありません
                        </div>
                      )}
                    </div>
                  </div>
                </section>
              ))}
            </div>
          </div>
        )}
      </main>

      <footer className="h-12 bg-[#482019]/10 border-t border-[#482019]/20" />
    </div>
  );
}

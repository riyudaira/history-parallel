"use client";

import { useState, useEffect } from "react";
import { useParams } from "next/navigation";
import { getRegionEvents } from "@/lib/api";
import { HistoricalEvent } from "@/types/history";

export default function RegionDetailPage() {
  const params = useParams();
  const regionId = Number(params.id);

  const [regionName, setRegionName] = useState("");
  const [events, setEvents] = useState<HistoricalEvent[]>([]);
  const [loading, setLoading] = useState(true);

  useEffect(() => {
    async function init() {
      setLoading(true);
      try {
        const data = await getRegionEvents(regionId);
        setRegionName(data.name);
        setEvents(data.historical_events);
      } catch (error) {
        console.error(error);
      } finally {
        setLoading(false);
      }
    }
    init();
  }, [regionId]);

  return (
    <div className="min-h-screen bg-[#EFDDD5] text-[#482019] font-serif">
      <main className="max-w-4xl mx-auto py-12 px-6">
        <h1 className="text-4xl font-bold text-center mb-20 border-b-2 border-[#CF7F72] inline-block w-full pb-6 tracking-widest">
          {regionName} 歴史全史
        </h1>

        {loading ? (
          <div className="text-center py-20 italic animate-pulse text-xl">
            古文書を紐解いています...
          </div>
        ) : (
          <div className="relative border-l-4 border-[#CF7F72]/30 ml-8 md:ml-48 pl-8 md:pl-16 space-y-20">
            {events.map((event) => (
              <article key={event.id} className="relative group">
                <div className="absolute left-[-50px] md:left-[-86px] top-0 w-10 h-10 bg-[#CF7F72] rounded-full border-4 border-[#EFDDD5] shadow-md group-hover:bg-[#482019] transition-colors z-20" />
                <div className="absolute left-[-260px] top-1.5 hidden md:block w-40 text-right font-black text-[#CF7F72] text-xl tracking-tighter whitespace-nowrap">
                  {event.year > 0
                    ? `AD ${event.year}`
                    : `BC ${Math.abs(event.year)}`}
                </div>
                <div className="bg-white/40 p-8 rounded-lg shadow-sm border border-white/30 hover:shadow-xl hover:bg-white/60 transition-all duration-300">
                  <header className="mb-4">
                    <span className="md:hidden text-lg font-bold text-[#CF7F72] block mb-2">
                      {event.year > 0
                        ? `AD ${event.year}`
                        : `BC ${Math.abs(event.year)}`}
                      年
                    </span>
                    <h2 className="text-2xl md:text-3xl font-bold text-[#482019]">
                      {event.title}
                      {event.era_name && (
                        <span className="text-lg font-normal opacity-60 ml-4 italic">
                          ({event.era_name})
                        </span>
                      )}
                    </h2>
                  </header>
                  <p className="text-lg leading-relaxed text-[#482019]/90 text-justify">
                    {event.description}
                  </p>
                </div>
              </article>
            ))}

            <div className="absolute bottom-0 left-[-14px] w-6 h-6 bg-[#CF7F72]/30 rounded-full" />
          </div>
        )}
      </main>

      <footer className="py-20 text-center opacity-30 text-sm tracking-widest">
        &copy; 歴史年表 Parallel - {regionName}
      </footer>
    </div>
  );
}

import { RegionData } from "@/types/history";

const API_BASE = "http://localhost/api";

export async function getEventsByPeriod(period: string): Promise<RegionData[]> {
  const res = await fetch(`${API_BASE}/history/period/${period}`, {
    cache: "no-store",
  });

  if (!res.ok) {
    throw new Error("データの取得に失敗しました");
  }
  return res.json();
}

export async function getRegionEvents(regionId: number) {
  const res = await fetch(`${API_BASE}/history/region/${regionId}`, {
    cache: "no-store",
  });
  if (!res.ok) throw new Error("地域データの取得に失敗しました");
  return res.json();
}

export async function getRegions(): Promise<{ id: number; name: string }[]> {
  const res = await fetch(`${API_BASE}/history/regions`, { cache: "no-store" });
  if (!res.ok) throw new Error("地域一覧の取得に失敗しました");
  return res.json();
}

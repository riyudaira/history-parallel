export interface HistoricalEvent {
  id: number;
  year: number;
  century: number;
  era_name: string | null;
  title: string;
  description: string | null;
  importance: number;
  region_id: number;
}

export interface RegionData {
  region_id: number;
  region_name: string;
  events: HistoricalEvent[];
}

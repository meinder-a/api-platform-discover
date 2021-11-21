import React from "react";
import { HydraAdmin, fetchHydra, hydraDataProvider } from "@api-platform/admin";
import { parseHydraDocumentation } from "@api-platform/api-doc-parser";

const entrypoint = "http://papi.gang";

const dataProvider = hydraDataProvider(
  entrypoint,
  fetchHydra,
  parseHydraDocumentation,
  true // useEmbedded parameter
);

export default () => (
  <HydraAdmin
    dataProvider={ dataProvider }
    entrypoint={ entrypoint }
  />
);

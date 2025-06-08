import {configureStore} from "@reduxjs/toolkit";
import authReducer from "./auth/slice.js";
import userReducer from "./users/slice.js";
import roleReducer from "./roles/slice.js";
import newsReducer from "./blog/slice.js";
import faqReducer from "./faq/slice.js";
import downloadReducer from "./download/slice.js";
import typeReducer from "./memos/type/slice.js";
import memoReducer from "./memos/memo/slice.js";
import videoReducer from "./video/slice.js";
import {
    persistStore,
    persistReducer,
    FLUSH,
    REHYDRATE,
    PAUSE,
    PERSIST,
    PURGE,
    REGISTER,
} from 'redux-persist';
import storage from 'redux-persist/lib/storage';
import {api} from "./operations.js";

const authPersistConfig = {
    key: 'auth',
    storage,
    whitelist: ['token','tfa'],
};

export const store = configureStore({
    reducer: {
        [api.reducerPath]: api.reducer,
        auth: persistReducer(authPersistConfig, authReducer),
        user: userReducer,
        role: roleReducer,
        news: newsReducer,
        faq: faqReducer,
        download: downloadReducer,
        type: typeReducer,
        memo: memoReducer,
        video: videoReducer,
    },
    middleware: (getDefaultMiddleware) =>
        getDefaultMiddleware({
            serializableCheck: {
                ignoredActions: [FLUSH, REHYDRATE, PAUSE, PERSIST, PURGE, REGISTER],
            },
        }).concat(api.middleware),
    devTools: true,
});

export const persistor = persistStore(store);

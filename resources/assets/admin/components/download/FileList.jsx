import React from 'react';
import {Link} from "react-router-dom";

export default function FileList({ data, handleDelete }) {
    return (
        <div className="p-4 border-t border-gray-100 dark:border-gray-800 sm:p-6">
            <div className="space-y-6">
                <div className="grid grid-cols-1 gap-5">

                    {data.map((item) => (
                        <div>
                            <div
                                className="rounded-xl border border-gray-200 bg-white p-5 dark:border-gray-800 dark:bg-white/[0.03] sm:p-6 flex items-start gap-6">
                                <div className="flex w-full items-stretch gap-6">
                                    <div className="flex-shrink-0 w-32 overflow-hidden rounded-lg">
                                        <img
                                            alt={item.origin}
                                            src={item.url}
                                            className="w-full h-full object-cover rounded-lg"
                                        />
                                    </div>

                                    <div className="flex-1 flex flex-col justify-center">
                                        <p className="text-sm text-gray-500 dark:text-gray-400 mb-1">
                                            <b>Оригінальне ім'я:</b> {item.origin}
                                        </p>
                                        <p className="text-sm text-gray-500 dark:text-gray-400 mb-1">
                                            <b>Поточне ім'я:</b> {item.name}
                                        </p>
                                        <p className="text-sm text-gray-500 dark:text-gray-400">
                                            <b>Дата завантаження:</b> {item.created_at}
                                        </p>
                                    </div>

                                    <div className="flex flex-col gap-3 flex flex-col justify-center">
                                        <Link
                                            to={item.url}
                                            target="_blank"
                                            className="inline-flex items-center justify-center px-4 py-3 text-sm font-medium text-white rounded-lg bg-brand-600 shadow-theme-xs hover:bg-brand-500"
                                            data-discover="true"
                                        >
                                            View
                                        </Link>
                                        <div
                                            onClick={() => handleDelete(item)}
                                            className="inline-flex cursor-pointer items-center justify-center px-4 py-3 text-sm font-medium text-white rounded-lg bg-red-600 shadow-theme-xs hover:bg-red-500"
                                        >
                                            Delete
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    ))}

                </div>
            </div>
        </div>
    )
}

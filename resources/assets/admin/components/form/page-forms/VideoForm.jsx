import React, {useEffect, useState} from "react";
import {Form, Field, Formik} from "formik";
import * as Yup from "yup";
import Label from "../Label.jsx";
import FormikInput from "../input/FormikInput.jsx";
import Button from "../../ui/button/Button.jsx";
import {errorHandler} from "../../utils/toastHandler.js";
import {useDeleteImageMutation, useImagesQuery, useUploadMutation} from "../../../redux/download/downloadApiSlice.js";
import FileList from "../../download/FileList.jsx";
import {useCrudPageLogic} from "../../../hooks/useCrudPageLogic.js";
import FileDropzone from "../../generics/FileDropzone.jsx";
import {Loading} from "../../loadingBar/Loading.jsx";
import PaginationInfo from "../../generics/PaginationInfo.jsx";
import {CardGrid} from "../../ui/card/CardGrid.jsx";

export default function VideoForm({
                                      current = null,
                                      defaultCurrent,
                                      handleSubmit,
                                      enableReinitialize = true,
                                      resources = [],
                                      backLinkPath,
                                  }) {

    const imageAccept = {
        'image/*': ['.jpeg', '.jpg', '.png', '.svg', '.webp', '.svg+xml']
    };

    const {
        data,
        meta,
        items,
        loadMore,
        hasMore,
        isFetchingMore
    } = useCrudPageLogic({
        useQuery: useImagesQuery,
        useDeleteMutation: useDeleteImageMutation,
        initialLimit: 3
    });


    const [uploadFile, {isLoading: isLoadingUploadFile}] = useUploadMutation();
    const [fileData, setFileData] = useState(current?.data || current?.preview || null);
    const [required, setRequired] = useState(false);

    useEffect(() => {
        if (current) {
            setFileData(current?.data || current?.preview);
        }
    }, [current]);

    const handleFileUpload = async (formData) => {
        try {
            const result = await uploadFile(formData).unwrap();
            setFileData(result?.data || result?.preview);
            setRequired(false);
        } catch (err) {
            errorHandler(err?.data?.message || 'Upload error');
        }
    };

    return (
        <div>
            <Formik
                initialValues={current ? current : defaultCurrent}
                enableReinitialize={enableReinitialize}
                validationSchema={Yup.object().shape({
                    title: Yup.string()
                        .max(255, 'Максимально допустимо 255 символів')
                        .min(3, 'Мінімально 3 символи')
                        .required('Поле необхідне до заповнення'),
                    url: Yup.string()
                        .max(255, 'Максимально допустимо 255 символів')
                        .required('Поле необхідне до заповнення')
                })}
                onSubmit={(values) => {
                    try {
                        if (fileData) {
                            handleSubmit({...values, preview: fileData});
                        } else {
                            setRequired(true);
                            errorHandler("Please upload file");
                            setSubmitting(false);
                        }
                    } catch (error) {
                        console.error(error);
                        setSubmitting(false);
                    }
                }}
            >
                {({isSubmitting, handleChange, handleBlur, values, errors, touched, setFieldValue}) => (
                    <Form autoComplete="off">
                        <div className="space-y-6">
                            <div className="pb-3">
                                <Label>
                                    Title <span className="text-error-500">*</span>{" "}
                                </Label>
                                <Field
                                    id="title"
                                    placeholder="Enter your title"
                                    name="title"
                                    autoFocus
                                    component={FormikInput}
                                    onChange={handleChange}
                                    onBlur={handleBlur}
                                    error={Boolean(errors.title && touched.title)}
                                    helperText={touched.title && errors.title}
                                />
                            </div>
                        </div>

                        <div className="space-y-6">
                            <div className="pb-3">
                                <Label>
                                    URL <span className="text-error-500">*</span>{" "}
                                </Label>
                                <Field
                                    id="url"
                                    placeholder="Enter url"
                                    name="url"
                                    autoFocus
                                    component={FormikInput}
                                    onChange={handleChange}
                                    onBlur={handleBlur}
                                    error={Boolean(errors.url && touched.url)}
                                    helperText={touched.url && errors.url}
                                />
                            </div>
                        </div>

                        {isLoadingUploadFile ? (
                            <div
                                className="absolute inset-0 z-50 flex items-center justify-center bg-white/60 dark:bg-gray-900/60 rounded-3xl">
                                <Loading/>
                            </div>
                        ) : (
                            <>
                                {!fileData
                                    ? <FileDropzone
                                        accept={imageAccept}
                                        handleSubmit={handleFileUpload}
                                        required={required}
                                    />
                                    : <FileList
                                        data={[fileData]}
                                        removeFileData={setFileData}
                                    />}

                                <div className="py-3">
                                    <div className="flex flex-wrap gap-4 justify-start">
                                        <Button
                                            type="submit"
                                            disabled={isSubmitting || !fileData}
                                            size="sm"
                                            className="w-40"
                                        >
                                            Save
                                        </Button>
                                    </div>
                                </div>

                                <Label>Виберіть з раніше завантажених:</Label>
                                <>
                                    <CardGrid
                                        data={items}
                                        setFileData={setFileData}
                                        isFetchingMore={isFetchingMore}
                                        loadMore={loadMore}
                                        hasMore={hasMore}
                                    />

                                    <div
                                        className="rounded-b-xl border-gray-100 py-4 pl-[18px] pr-4 dark:border-white/[0.05]">
                                        <div className="flex flex-col xl:flex-row xl:items-center xl:justify-between">
                                            <PaginationInfo data={data} meta={meta} onlyTo={true}/>
                                        </div>
                                    </div>
                                </>
                            </>
                        )}
                    </Form>
                )}
            </Formik>
        </div>
    )
}

import {helpers} from "@vuelidate/validators";

export const letters = helpers.withParams(
    {type: 'letters'},
    value => !helpers.req(value) || /^\p{L}+$/u.test(<string>value)
);

export const login = helpers.withParams(
    {type: 'login'},
    value => !helpers.req(value) || /^[A-Za-z0-9\-_]+$/.test(<string>value)
)

export const date = helpers.withParams(
    {type: 'date'},
    value => !helpers.req(value) || /^\d{4}-\d{2}-\d{2}$/.test(<string>value)
)

// Тип для объекта rules
export type RulesType = Record<string, (value: any) => boolean>;

// Тип для объекта state
export type StateType = Record<string, any>;

// Тип возвращаемого значения функции useVuelidate
export type ValidationResultType = {
    [key: string]: boolean;
};

// declare props interface
export interface IProps {
    errors?: string[]
    value?: string
    name: string
    type?: string
    placeholder?: string
    label: string
    width?: string
}

// declare emit interface
export interface IEmit {
    'update:value': [value: string]
}

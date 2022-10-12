<script>

    const props = {
        field: {
            type: Object,
            default: null
        },
    };

    export default {
        props,
        render: _ => null,
        data() {
            return {
                element: null,
            }
        },
        computed: {

            /**
             * Get options
             *
             * @return {{position: number}}
             */
            options() {
                return {
                    position: this.field?.position !== undefined ? this.field?.position : 1,
                }
            },


            /**
             * Get disposition of elements
             *
             * @return {*}
             */
            disposition() {

                const rowOfField = this.element?.parentNode
                const rowOfHeader = rowOfField?.parentNode?.parentNode?.parentNode?.getElementsByTagName('thead')?.[0]?.children?.[0];

                const cellOfField = this.element;
                const cellOfLinks = rowOfField?.lastChild;

                const indexOfFieldInRow = Array.from(rowOfField?.children || []).indexOf(cellOfField)
                const indexOfLinksInRow = Array.from(rowOfField?.children || []).indexOf(cellOfLinks);

                const cellOfFieldInHeader = Array.from(rowOfHeader?.children || []).find(node => node?.textContent === this.field?.name);
                const cellOfLinksInHeader = Array.from(rowOfHeader?.children || []).find(node => node?.textContent === 'Controls');

                return {
                    rowOfField,
                    cellOfField,
                    cellOfLinks,
                    rowOfHeader,
                    indexOfFieldInRow,
                    indexOfLinksInRow,
                    cellOfFieldInHeader,
                    cellOfLinksInHeader,
                }
            },


        },
        methods: {

            /**
             * Move links inside row to column
             *
             * @param rowOfField
             * @param cellOfLinks
             * @param rowOfHeader
             * @param cellOfLinksInHeader
             *
             * @return {void}
             */
            moveLinksInsideRowToColumn({rowOfField, cellOfLinks, rowOfHeader, cellOfLinksInHeader} = {}) {

                rowOfField?.insertBefore(cellOfLinks, rowOfField?.children?.[this.options.position]);
                rowOfHeader?.insertBefore(cellOfLinksInHeader, rowOfHeader?.children?.[this.options.position]);

            },


            /**
             * Remove field from table
             *
             * @param cellOfField
             * @param cellOfFieldInHeader
             */
            removeFieldFromTable({cellOfField, cellOfFieldInHeader}) {
                cellOfField?.remove();
                cellOfFieldInHeader?.remove();
            }

        },

        mounted() {
            this.$nextTick(() => this.element = this._?.vnode?.el?.parentElement);
        },

        watch: {
            disposition: {
                deep: true,
                handler(disposition) {
                    this.moveLinksInsideRowToColumn(disposition);
                    this.removeFieldFromTable(disposition);
                }
            }
        }
    }
</script>
